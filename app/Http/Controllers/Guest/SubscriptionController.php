<?php

namespace App\Http\Controllers\Guest;

use App\Models\System\Plan;
use Illuminate\Http\Request;
use App\Models\System\Client;
use App\Http\Controllers\Controller;

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
        
        // return redirect()->route('home')->with('success', 'Your plan subscribed successfully');
        return ('success Your plan subscribed successfully');
    }
}
