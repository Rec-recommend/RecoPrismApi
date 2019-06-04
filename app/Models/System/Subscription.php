<?php

namespace App\Models\System;

use Mockery\Expectation;
use Illuminate\Support\Str;
use Hyn\Tenancy\Models\Hostname;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $fillable = [
        'api_key', 'hostname_id', 'plan_id', 'is_active'
    ];

    public static function new(Hostname $hostname, PaymentPlan $plan)
    {
        $api_key = "";
        do {
            $api_key = Str::random(32);
        } while (Subscription::where('api_key', $api_key)->first());
        $subscription = Subscription::create([
            'api_key' => $api_key,
            'hostname_id' => $hostname->id,
            'payment_plan_id' => $plan->id,
            'is_active' => true
        ]);
        // store value in cache memory 
        $value = Redis::set($hostname->fqdn, $subscription->api_key);
        return $subscription;
    }

    public static function suspend(Hostname $hostname)
    {
        Subscription::where('hostname_id', $hostname->id)->update('is_active', false);
    }
}
