<?php

namespace App\Http\Controllers\System;

use App\Models\Tenant\TenantAdmin;
use Illuminate\Support\Facades\Config;
use \Stripe\Plan as stripe_plan;
use App\Models\System\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System\Plan;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;

Stripe::setApiKey(env('STRIPE_SECRET'));

class PlanController extends Controller
{
    public function getClient()
    {
        $admin = TenantAdmin::where('email', auth()->user()->email)->first();
        Config::set('database.default', 'system');
        return Client::where('email', $admin->email)->first();
    }
    public function create_plan(Request $request)
    {
        $plan = stripe_plan::create(
            array(
                "amount" => strval((int)$request->package_price * 100),
                "interval" => "month",
                "product" => ["name" => $request->package_name],
                "currency" => "usd",
            )
        );
        return $plan->id;
    }
    public function index(Request $request)
    {
        $client = $this->getClient();
        $plans = Plan::all();
        return view('tenant.subscription', compact('plans', 'client'));
    }
    public function show()
    {
        $plans = Plan::all();
        return view('system/plans')->with('plans', $plans);
    }

    public function create()
    {
        return view('system/addPlane');
    }
    public function store(Request $request)
    {

        $stripe_id = $this->create_plan($request);
        $plan = new Plan();
        $plan->name = $request->package_name;
        $plan->cost = $request->package_price;
        $plan->total_req = $request->package_total_req;
        $plan->slug = strtolower($request->package_name);
        $plan->description = $request->package_description;
        $plan->stripe_plan = $stripe_id;
        $validator = Validator::make($plan->attributesToArray(), Plan::rules());
        if ($validator->fails()) {
            return redirect('package/create')
                ->withInput()
                ->withErrors($validator);
        }
        $plan->save();
        return redirect('/packages/show')->withSuccess('Pacakge Created Successfuly');
    }
    public function destroy($id)
    {
        $package = Plan::find($id);
        $package->delete();
        return redirect('/packages/show')->withSuccess('Pacakge Deleted Successfuly');
    }
}
