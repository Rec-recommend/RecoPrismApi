<?php

namespace App\Http\Middleware;

use Closure;
use League\Flysystem\Config;
use App\Models\Tenant\Setting;
use Hyn\Tenancy\Models\Hostname;

class CheckRequestsAmount
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
            return $next($request);
    }
}
