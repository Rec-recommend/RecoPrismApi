<?php

namespace App\Http\Middleware;

use Closure;
use League\Flysystem\Config;
use App\Models\Tenant\Setting;
use Hyn\Tenancy\Models\Hostname;
use App\Models\System\Client;
use App\Models\System\Subscription ;
use App\Models\System\Plan ;

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
     {   $subPlan = Subscription::where('fqdn', $request->getHttpHost())
        ->Join('hostnames', 'subscriptions.client_id', '=', 'hostnames.id')
        ->Join('plans', 'subscriptions.stripe_plan', '=', 'plans.stripe_plan')
        ->select('subscriptions.id','used_req','total_req')->first();
 
         if($subPlan->total_req >$subPlan->used_req ){

          Subscription::where('id',$subPlan->id)->update(array('used_req' => $subPlan->used_req +=1));
          return $next($request);
          
         } 
         
         else{
            return response()->json(['message'=>'Insufficient amount of Requests'],403);
         }
    }

}
