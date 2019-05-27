<?php

namespace App\Http\Middleware;

use Closure;
use App\Subscription;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Library\Response\JsonResponse;
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
        return !($this->header_key($request) === $this->cached_key($request)) ? $this->invalid() : $next($request);
    }

    public function invalid(){
        return response()->json(['key'=>'Invalid API Key was given']);
    }
    
    public function header_key($request){
        return isset($request->header()['key'])?  $request->header()['key'][0] : false;
    }
    
    public function cached_key( $request){
        // get the redis cached value from the created subsription 
        return Redis::get($request->header()['host'][0]);
    }
}
