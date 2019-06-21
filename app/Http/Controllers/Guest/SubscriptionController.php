<?php

namespace App\Http\Controllers\Guest;

use Mail;
use App\Mail\Recoprism;
use App\Models\System\Plan;
use Illuminate\Http\Request;
use App\Models\System\Client;
use App\Models\System\Tenancy;
use App\Models\Tenant\TenantAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class SubscriptionController extends Controller
{
    public function __construct()
    { }
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

        $domain = $client->subdomain . "." . env('APP_URL');

        $output = shell_exec(base_path() . "/recos.sh --host $domain " . base_path());

        return redirect("http://" . $domain);
    }

    public function swap(Request $request)
    {
        $client = $this->getClient();
        $plans = Plan::all();
        $client->subscription('main')->swap($request->plan_id);

        return view('tenant.subscription', compact('plans', 'client'));
    }
    public function unsubscribe()
    {
        $client = $this->getClient();
        $plans = Plan::all();
        $client->subscription('main')->cancel();
        Client::where('id', $client->id)->update(array('status' => '0'));
        $client->status = 0;
        return view('tenant.subscription', compact('plans', 'client'));
    }

    public function resume()
    {
        $client = $this->getClient();
        $plans = Plan::all();
        $client->subscription('main')->resume();
        Client::where('id', $client->id)->update(array('status' => '1'));
        $client->status = 1;
        return view('tenant.subscription', compact('plans', 'client'));
    }

    public function getClient()
    {
        $admin = TenantAdmin::where('email', auth()->user()->email)->first();
        Config::set('database.default', 'system');
        return Client::where('email', $admin->email)->first();
    }
}
