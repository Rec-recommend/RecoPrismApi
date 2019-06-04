<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class EnforceTenancy
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
        // $domin = $request->header()['host'][0];
        // if ($domin !== "recoprism.com" || $domin !== "admin.recoprism.com") {
        Config::set('database.default', 'tenant');
        Config::set('auth.defaults',[
                'guard' => 'tenant_admin',
                'passwords' => 'tenant_admins',
            ]);
        return $next($request);
    }
}
