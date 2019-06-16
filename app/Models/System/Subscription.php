<?php

namespace App\Models\System;

use Mockery\Expectation;
use App\Models\System\Plan;
use Illuminate\Support\Str;
use Hyn\Tenancy\Models\Hostname;
use Illuminate\Support\Facades\Redis;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $fillable = [
        'api_key', 'hostname_id', 'plan_id', 'is_active'
    ];

    public static function new(Hostname $hostname, Plan $plan)
    {
      
    }

    public static function suspend(Hostname $hostname)
    {
        Subscription::where('hostname_id', $hostname->id)->update('is_active', false);
    }


    public function check_requests(){
        return $this->plan()->total_req > $this->used_req; 
    }


    public function plan(){
        return Plan::where('stripe_plan',$this->stripe_plan)->first();
        // return $this->belongsTo('App\Models\System\Plan');
    }
}
