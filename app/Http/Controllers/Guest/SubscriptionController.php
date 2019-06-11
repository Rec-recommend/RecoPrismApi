<?php

namespace App\Http\Controllers\Guest;

use Mail; 
use App\Mail\Recoprism;
use App\Models\System\Plan;
use Illuminate\Http\Request;
use App\Models\System\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {   
        // dd($request->all());
        $client = Client::find($request->client);
        $plan = Plan::find($request->plan);
        if($client->subscribedToPlan($plan->stripe_plan, 'main')) {
            return redirect()->route('home')->with('success', 'You have already subscribed the plan');
        }
        $plan = Plan::findOrFail($request->get('plan'));
        
        $client
            ->newSubscription('main', $plan->stripe_plan)
            ->create($request->stripeToken);
        $client->plan = $plan;
        Mail::to($client->email)->send(new Recoprism($client));
        // return redirect()->route('home')->with('success', 'Your plan subscribed successfully');
        return ('success Your plan subscribed successfully');
    }
    public function index (Request $request){
        Config::set('database.default', 'system');
        $plans = Plan::all();
            return view('tenant.subscription',compact('plans'));
    }
    public function swap (Request $request){
        Config::set('database.default', 'system');
        $plans = Plan::all();
        $client = Client::find(auth()->user()->id);
    $client->subscription('main')->swap($request->plan_id);

    return view('tenant.subscription',compact('plans'));
}
}
