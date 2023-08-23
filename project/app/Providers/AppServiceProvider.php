<?php

namespace App\Providers;

use App\Models\Generalsetting;
use App\Models\UserGeneralsetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        view()->composer('*', function ($settings) {
            if (Request::is('admin') || Request::is('admin/*')) {
                $settings->with('gs', Generalsetting::first());
            } elseif (Request::is('seller') || Request::is('seller/*')) {
                $settings->with('gs', cache()->remember('seller' . getUser('domain') . getUser('user_id'), now()->addDay(), function () {
                    return UserGeneralsetting::first();
                }));
            } else {
                $settings->with('gs', Generalsetting::first());
            }
        });

        view()->composer(['front.*', 'theme1.*', 'theme2.*', 'common.*'], function ($settings) {

            $user = getUser('user_id');
            if ($user == 'user_id') {
                return true;
            }

            $settings->with('gs', cache()->remember('seller' . getUser('domain') . getUser('user_id'), now()->addDay(), function () {
                return UserGeneralsetting::first();
            }));
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
