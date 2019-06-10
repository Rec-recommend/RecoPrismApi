<?php

namespace App\Http\Controllers\Guest;

use Mail;
use App\Mail\Recoprism;
use App\Models\System\Plan;
use Illuminate\Http\Request;
use App\Models\System\Client;
use App\Models\System\Tenancy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $client = Client::find($request->client);

        $plan = Plan::find($request->plan);

        if ($client->subscribedToPlan($plan->stripe_plan, 'main')) {
            return redirect()->route('home')->with('success', 'You have already subscribed the plan');
        }

        $plan = Plan::findOrFail($request->get('plan'));

        $client
            ->newSubscription('main', $plan->stripe_plan)
            ->create($request->stripeToken);

        $client->plan = $plan;


        Tenancy::create($client);


        Mail::to($client->email)->send(new Recoprism($client));


        return redirect("http://" . $client->subdomain . ".recoprism.com");
    }
}
