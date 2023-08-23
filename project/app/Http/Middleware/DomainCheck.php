<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DomainCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
       
        if(Auth::guard('web')->check()){
            if(auth()->guard('web')->id() == getUser('user_id')){
                return $next($request);
            }else{
                Auth::guard('web')->logout();
                return redirect(RouteServiceProvider::SELLERLOGIN);
            }
        }

        if(getUser('domain') != $request->getHost()){
            return redirect()->route('error');
        }else{
            return $next($request);
        }
    }
}
