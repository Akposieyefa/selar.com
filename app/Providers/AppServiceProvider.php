<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use PHPUnit\Util\Blacklist;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * admin check
         */
        Blade::if('admin', function (){
            return auth()->check() && auth::user()->role_id == 1;
        });

        /**
         *user check
         */
        Blade::if('user', function (){
            return auth()->check() && auth::user()->role_id == 2;
        });
    }
}
