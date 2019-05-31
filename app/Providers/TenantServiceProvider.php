<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TenantServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind([
            'App\Repositories\Tenant\ItemRepository',
            'App\Repositories\Tenant\UserRepository'
        ]
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
