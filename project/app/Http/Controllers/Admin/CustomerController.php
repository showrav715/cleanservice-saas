<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\EmailHelper;
use App\Models\Brand;
use App\Models\UserContactPage;
use App\Models\Currency;
use App\Models\Domain;
use App\Models\Package;
use App\Models\PackageOrder;
use App\Models\PaymentGateway;
use App\Models\Slider;
use App\Models\SupportTicket;
use App\Models\TicketMessage;
use App\Models\User;
use App\Models\UserBlog;
use App\Models\UserBlogCategory;
use App\Models\UserGeneralsetting;
use App\Models\UserPage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function index()
    {
        $sellers = User::with('user_package', 'domain')->get();
        return view('admin.customer.index', compact('sellers'));
    }

    public function create()
    {
        $gateweys = PaymentGateway::get();
        $packages = Package::whereStatus(1)->get();
        return view('admin.customer.create', compact('gateweys', 'packages'));
    }

    public function store(Request $request)
    {

        $this->validation($request);

        DB::beginTransaction();
        try {

            // create a new user
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'seller';
            $user->status = 1;
            $user->email_verified = 1;
            $user->save();

            // create a new general setting
            $preload_gs = UserGeneralsetting::where('id', 0)->first()->toArray();
            $preload_gs['user_id'] = $user->id;
            $gs = new UserGeneralsetting();
            $gs->fill($preload_gs)->save();

            // create a new contact page
            $preload_contact_pages = UserContactPage::where('id', 0)->first()->toArray();
            $preload_contact_pages['user_id'] = $user->id;
            $contact_page = new UserContactPage();
            $contact_page->fill($preload_contact_pages)->save();

            $package = Package::find($request->package_id);
            $exp_days = $package->duration;
            if ($package->duration_type == 'month') {
                $exp_days = $package->duration * 30;
            } elseif ($package->duration_type == 'year') {
                $exp_days = $package->duration * 365;
            } else {
                $exp_days = $package->duration;
            }
            $expiry_date = \Carbon\Carbon::now()->addDays(($exp_days))->format('Y-m-d');

            // create a new package order
            $order = new PackageOrder();
            $order->order_no = $user->id . 'ORD-' . time();
            $order->amount = $package->price;
            $order->txn = $request->trasection_id;
            $order->will_expire = $expiry_date;
            $order->user_id = $user->id;
            $order->currency = json_encode(Currency::where('default', 1)->first(), true);
            $order->package_id = $package->id;
            $order->method = $request->method;
            $order->status = 1;
            $order->payment_status = 1;
            $order->save();

            // create a new Domain
            $dom = new Domain();
            $dom->domain = $request->domain_name;
            $dom->status = 1;
            $dom->user_id = $user->id;
            $dom->is_trial = $package->price == 0 ? 1 : 0;
            $dom->data = json_encode($package, true);
            $dom->will_expire = $expiry_date;
            $dom->package_order_id = $order->id;
            $dom->save();

            // update domain id
            $user = User::find($user->id);
            $user->domain_id = $dom->id;
            $user->save();
            DB::commit();

        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
        }
        return redirect()->route('admin.customer.index')->with('success', 'Customer created successfully');
    }

    public function update(Request $request, $id)
    {
        $this->validation($request, $id);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->save();
        return redirect()->route('admin.customer.index')->with('success', 'Customer updated successfully');
    }

    public function editPackage($id)
    {
        $user = User::with('user_package', 'domain')->find($id);
        $domain = $user->domain;
        $data = json_decode($domain->data);
        return view('admin.customer.edit_package', compact('user', 'data'));
    }

    public function updatePackage(Request $request, $id)
    {
        $user = User::with('user_package', 'domain')->find($id);
        $input = $request->except('_token', 'method');
        $domain = $user->domain;
        $data = json_decode($domain->data, true);
        $package_data = array_merge($data, $input);
        $domain->data = json_encode($package_data, true);
        $domain->save();
        return redirect()->route('admin.customer.index')->with('success', 'Package updated successfully');
    }

    public function validation($request, $id = null)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email' . ($id ? ',' . $id : ''),
            'password' => $id ? '' : 'required' . '|min:4',
            'domain_name' => $id ? '' : 'required',
        ]);
    }

    public function view($id)
    {
        $package_histories = PackageOrder::with('package_info')->where('user_id', $id)->get();
        $customers = User::where('owner_id', $id)->get();
        $user = User::with('user_package', 'domain')->find($id);
        return view('admin.customer.view', compact('user', 'package_histories', 'customers'));
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        try {
            // delete folder and files
            $path = 'assets/images/' . $user->id;
            if (file_exists($path)) {
                File::deleteDirectory($path);
            }

            $brands = Brand::where('user_id', $user->id)->get();
            $brands->each(function ($brand) {
                $brand->delete();
            });

            // $contact_messages = ContactMessage::where('user_id', $user->id)->get();
            // $contact_messages->each(function ($contact_message) {
            //     $contact_message->delete();
            // });

            $contact_page = UserContactPage::where('user_id', $user->id)->first();
            if ($contact_page) {
                $contact_page->delete();
            }

            $domain = Domain::where('user_id', $user->id)->first();
            if ($domain) {
                $domain->delete();
            }

            $package_orders = PackageOrder::where('user_id', $user->id)->get();
            $package_orders->each(function ($package_order) {
                $package_order->delete();
            });

            $sliders = Slider::where('user_id', $user->id)->get();
            $sliders->each(function ($slider) {
                $slider->delete();
            });

            $support_tickets = SupportTicket::where('user_id', $user->id)->get();
            $support_tickets->each(function ($support_ticket) {
                $support_ticket->delete();
            });

            $ticket_messages = TicketMessage::where('user_id', $user->id)->get();
            $ticket_messages->each(function ($ticket_message) {
                $ticket_message->delete();
            });

            $blogs = UserBlog::where('user_id', $user->id)->get();
            $blogs->each(function ($blog) {
                $blog->delete();
            });

            $blog_categories = UserBlogCategory::where('user_id', $user->id)->get();
            $blog_categories->each(function ($blog_category) {
                $blog_category->delete();
            });

            $settings = UserGeneralsetting::where('user_id', $user->id)->first();
            if ($settings) {
                $settings->delete();
            }

            $pages = UserPage::where('user_id', $user->id)->get();
            $pages->each(function ($page) {
                $page->delete();
            });

            $user->delete();
            return back()->with('success', 'User deleted successfully');

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }

    public function sendMail(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);
        $customer = User::find($id);
        $data = [
            'email' => $customer->email,
            'name' => $customer->name,
            'subject' => $request->subject,
            'body' => $request->body,
        ];
        $MAIL = new EmailHelper();
        $MAIL->customMail($data);
        return redirect()->route('admin.customer.index')->with('success', 'Mail sent successfully');
    }

}
