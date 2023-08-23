<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Subscriber;
use App\Models\UserGeneralsetting;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function currencySetup(Request $request)
    {
        session()->put('landing_currency', $request->currency_id);
        return back();
    }


    // DASHBOARD
    public function index()
    {
        $name = Str::slug(Auth::id() . Auth::user()->name);
        @unlink('assets/qrcode/' . $name . '.png');
        \QrCode::format('png')->size(600,600)->generate(getUser('domain'), 'assets/qrcode/'.$name.'.png');

        $domain = Auth::user()->domain;
        $domain_info = json_decode($domain->data, true);
        
        $total_services = UserService::count();

        return view('seller.dashboard', compact('domain_info', 'domain', 'total_services', ));
    }

    // PROFILE
    public function profile()
    {
        $data = seller();
        return view('seller.profile', compact('data'));
    }

    // PROFILE
    public function profileupdate(Request $request)
    {

        $request->validate(['name' => 'required', 'email' => 'required|email', 'phone' => 'required']);
        $data = seller();
        $input = $request->only('name', 'photo', 'phone', 'email');

        if ($request->hasFile('photo')) {
            $status = MediaHelper::ExtensionValidation($request->file('photo'));
            if (!$status) {
                return back()->with('error', __('Image format is invalid'));
            }
            $input['photo'] = MediaHelper::handleUpdateImage($request->file('photo'), $data->photo, [200, 200]);
        }

        $data->update($input);
        return back()->with('success', __('Profile Updated Successfully'));
    }

    // CHANGE PASSWORD
    public function passwordreset()
    {
        return view('seller.change_password');
    }

    public function changepass(Request $request)
    {
        $request->validate(['old_password' => 'required', 'password' => 'required|confirmed|min:6']);
        $user = seller();
        if ($request->old_password) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = bcrypt($request->password);
                $user->update();
            } else {
                return back()->with('error', __('Old Password Mismatch'));
            }
        }

        return back()->with('success', __('Password Changed Successfully'));

    }

    public function cookie()
    {
        return view('seller.cookie');
    }

    public function updateCookie(Request $request)
    {

        $data = $request->validate([
            'status' => 'required',
            'button_text' => 'required',
            'cookie_text' => 'required',
        ]);

        $gs = UserGeneralsetting::first();
        $gs->cookie = $data;
        $gs->update();
        Cache::forget('seller' . getUser('domain') . getUser('user_id'));
        return back()->with('success', 'Cookie concent updated');
    }

    public function subscribers()
    {
        $data['subscribers'] = Subscriber::orderBy('id', 'desc')->paginate(10);
        return view('seller.subscribers', $data);
    }

    public function subscribersDelete(Request $request)
    {
        $data = Subscriber::findOrFail($request->id);
        $data->delete();
        return back()->with('success', __('Subscriber Deleted Successfully'));
    }

}
