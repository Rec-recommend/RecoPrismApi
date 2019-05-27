<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hyn\Tenancy\Models\Hostname;
use Illuminate\Support\Str;
use Mockery\Expectation;

class Subscription extends Model
{
    protected $fillable = [
        'api_key', 'hostname_id','plan_id','is_active'
    ];
    
    public static function new(Hostname $hostname, PaymentPlan $plan){
        
        $api_key = "";
        do {
            $api_key = Str::random(32);
        } while(Subscription::where('api_key', $api_key)->first());

        try{
            $subscription = create([
                'api_key' => $api_key,
                'hostname_id'=>$hostname->id,
                'plan_id'=>$plan->id,
                'is_active'=>true
                ]);
                return $subscription;

        }catch(Expectation $e){
            return false;
        }
    }

    public static function suspend(Hostname $hostname){
        Subscription::where('hostname_id',$hostname->id)->update('is_active',false);
    }
}
