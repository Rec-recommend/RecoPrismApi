<?php

namespace App\Providers;

use App;


use Hyn\Tenancy\Environment;
use Illuminate\Support\Facades\DB;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        // config(['database.default' => 'tenant']);
    }
}
