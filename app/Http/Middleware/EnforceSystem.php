<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class EnforceSystem
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Config::set('database.default', 'system');
        Config::set('auth.defaults', 
        [   
            'guard'=>'system_admin',
            'passwords'=>'system_admins',
        ]);
        // Config::set('auth.defaults.passwords', 'system_admins');
        // dd(Config::get('auth.defaults'));
        return $next($request);
    }
}
