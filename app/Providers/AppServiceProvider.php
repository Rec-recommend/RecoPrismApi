<?php

namespace App\Providers;

use Hyn\Tenancy\Environment;


use App;
use Illuminate\Support\ServiceProvider;

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
        \Laravel\Passport\Passport::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $env = app(Environment::class);
        if ($hostname = optional($env->hostname()));
        if ($fqdn= optional($hostname->fqdn)) {
            config(['database.default' => 'tenant']);
        }
    }
}
