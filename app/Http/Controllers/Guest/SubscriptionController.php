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

        $domain =$client->subdomain . ".recoprism.com";

        $output = shell_exec(base_path()."/recos.sh --host $domain ".base_path());

        return redirect("http://" . $domain);
    }
    public function index(Request $request)
    {
        Config::set('database.default', 'system');
        $plans = Plan::all();
        return view('tenant.subscription', compact('plans'));
    }
    public function swap(Request $request)
    {
        $admin = TenantAdmin::where('email', auth()->user()->email)->first();
        Config::set('database.default', 'system');
        // $client = Client::where(where('email',auth()->user()->email)->first());
        $client = Client::where('email', $admin->email)->first();
        // dd($client);
        $plans = Plan::all();
        $client->subscription('main')->swap($request->plan_id);

        return view('tenant.subscription', compact('plans'));
    }
    public function unsubscribe(){
        $admin = TenantAdmin::where('email', auth()->user()->email)->first();
        Config::set('database.default', 'system');
        $client = Client::where('email', $admin->email)->first();
        $client->subscription('main')->cancel();
    }
}
