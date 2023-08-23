<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SellerEndDate
{
    public function handle(Request $request, Closure $next, ...$guards)
    {

        $check = getPackage();
        if ($check == 'not found') {
            Session::flash('errors', 'Subdomain not found. Please contact with admin.');
            return abort(404);
        }

      
            if (checkSellerEndData()) {
                if(Auth::user()){
                    return redirect()->route('seller.subscription.index')->with('error', 'Your subscription has been expired. Please renew your subscription to continue using our services.');
                }else{
                    return redirect()->route('seller.login')->with('error', 'Your subscription has been expired. Please renew your subscription to continue using our services.');
                }
            }
        
        return $next($request);
    }
}
