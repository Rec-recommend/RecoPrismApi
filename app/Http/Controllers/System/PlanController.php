<?php

namespace App\Http\Controllers\System;
use \Stripe\Plan as stripe_plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System\Plan;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;
Stripe::setApiKey(env('STRIPE_SECRET'));

class PlanController extends Controller
{   public function create_plan (Request $request){
   $plan = stripe_plan::create(array(
        "amount" => strval((int)$request->package_price*100),
        "interval" => "month",
        "product" => ["name"=> $request->package_name],
        "currency" => "usd",
        )
   );
   return $plan -> id ;

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

        $stripe_id = $this -> create_plan($request);
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
