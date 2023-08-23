<?php

namespace App\Http\Middleware;

use App\Models\Language;
use App\Models\UserLanguage;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

        if (sellerId() != 'user_id') {
            $lang = UserLanguage::where('is_default', 1)->first();
            $code = $lang ? $lang->code : 'en';
            session()->put('lang', $code);
            app()->setLocale(sellerId() . session('lang'));
        } else {

            $code = 'en';
            $lang = Language::where('is_default', 1)->first();
            $code = $lang ? $lang->code : 'en';

            if (Auth::guard('admin')->user()) {
                if (\Request::is('admin') || \Request::is('admin/*')) {
                    $lang = Language::where('is_default', 1)->first();
                    app()->setLocale($lang->code);
                    return $next($request);
                }
            }
            app()->setLocale($code);
        }

        return $next($request);
    }

}
