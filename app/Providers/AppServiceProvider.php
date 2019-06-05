<?php

namespace App\Providers;

use App;


use Hyn\Tenancy\Environment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    { }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('system', function () {
            return Config('auth.defaults.guard')=== "system_admin";
        });
        Blade::if('tenant', function () {
            return Config('auth.defaults.guard')=== "tenant_admin";
        });

    }
}
