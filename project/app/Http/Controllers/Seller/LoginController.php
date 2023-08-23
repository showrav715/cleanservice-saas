<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web', ['except' => ['logout']]);
    }

    public function showLoginForm()
    { 
        if(User::where('force_login',1)->exists()){
            $user = User::where('force_login',1)->first();
            $user->force_login = 0;
            $user->save();
            Auth::loginUsingId($user->id);
            return redirect()->route('seller.dashboard');
        }else{
            return view('seller.auth.login');
        }
        
        
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            
            return redirect(route('seller.dashboard'));
        }
        return back()->with('error', 'Sorry! Credentials Mismatch.');
    }

    public function forgotPasswordForm()
    {
        return view('seller.auth.forgot_passowrd');
    }

    public function forgotPasswordSubmit(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $existMerchant = Admin::where('email', $request->email)->first();
        if (!$existMerchant) {
            return back()->with('error', 'Sorry! Email doesn\'t exist');
        }

        $existMerchant->verify_code = randNum();
        $existMerchant->save();

        @email([
            'email' => $existMerchant->email,
            'name' => $existMerchant->name,
            'subject' => 'Password Reset Code',
            'message' => 'Password reset code is : ' . $existMerchant->verify_code,
        ]);
        session()->put('email', $existMerchant->email);
        return redirect(route('seller.verify.code'))->with('success', 'A password reset code has been sent to your email.');
    }

    public function verifyCode()
    {
        return view('seller.auth.verify_code');
    }

    public function verifyCodeSubmit(Request $request)
    {
        $request->validate(['code' => 'required|integer']);
        $user = User::where('email', session('email'))->first();
        if (!$user) {
            return back()->with('error', 'User doesn\'t exist');
        }

        if ($user->verify_code != $request->code) {
            return back()->with('error', 'Invalid verification code.');
        }
        return redirect(route('seller.reset.password'));
    }

    public function resetPassword()
    {
        return view('seller.auth.reset_password');
    }

    public function resetPasswordSubmit(Request $request)
    {
        $request->validate(['password' => 'required|confirmed|min:5']);
        $merchant = User::where('email', session('email'))->first();
        $merchant->password = bcrypt($request->password);
        $merchant->update();
        return redirect(route('seller.login'))->with('success', 'Password reset successful.');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect(route('seller.login'));
    }
}
