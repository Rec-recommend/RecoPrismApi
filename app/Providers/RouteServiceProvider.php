<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        $this->mapGuestRoutes();

        $this->mapSystemRoutes();

        $this->mapTenantRoutes();
    }

    protected function mapGuestRoutes()
    {
        Route::domain("recoprism.com")
        ->middleware('web_system')
        ->namespace($this->namespace)
        ->group(base_path('routes/guest/web.php'));

        Route::domain("recoprism.com")
        ->middleware('web_system')
        ->namespace($this->namespace)
        ->group(base_path('routes/guest/api.php'));
    }



    protected function mapSystemRoutes()
    {
        Route::domain('admin.recoprism.com')
        ->middleware('web_system')
        ->namespace($this->namespace)
        ->group(base_path('routes/system/web.php'));

        Route::domain('admin.recoprism.com')
        ->middleware('api_system')
        ->namespace($this->namespace)
        ->group(base_path('routes/system/api.php'));
    }

    protected function mapTenantRoutes()
    {
        $hostname  = app(\Hyn\Tenancy\Environment::class)->hostname();
        if(isset($hostname)){
            Route::middleware('web_tenant')
            ->namespace($this->namespace)
            ->group(base_path('routes/tenant/web.php'));

            Route::prefix('api')
            ->middleware('api_tenant')
            ->namespace($this->namespace)
            ->group(base_path('routes/tenant/api.php'));
        }
    }

}
