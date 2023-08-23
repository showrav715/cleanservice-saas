<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
       /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
       
        if (Request::is('admin') || Request::is('admin/*')){
            return route('admin.login');
        }
        if (Request::is('seller') || Request::is('seller/*')){
            return route('seller.login');
        }
        if (Request::is('user') || Request::is('user/*')){
            return route('seller.user.login');
        }
    }
}
