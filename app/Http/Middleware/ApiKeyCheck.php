<?php

namespace App\Http\Middleware;

use Closure;
use App\Subscription;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Library\Response\JsonResponse;
use App\Models\Tenant\Setting;

// function fail($code = 400)
// {
    //     return new Fail($code);
    // }
    // function success($code = 200)
    // {
        //     return new Success($code);
        // }

class ApiKeyCheck
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
        return !($this->header_key($request) === $this->db_key()) ? $this->invalid() : $next($request);
    }

    public function invalid(){
        return response()->json(['api-key'=>'Invalid API Key was given'],403);
    }

    public function header_key($request){
        return isset($request->header()['api-key'])?  $request->header()['api-key'][0] : false;
    }

    public function cached_key( $request){
        // get the redis cached value from the created subsription
        return Redis::get($request->header()['host'][0]);
    }

    public function db_key(){
        return Setting::where('key','api-key')->first()['value'];
    }
}
