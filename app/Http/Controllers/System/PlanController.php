<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System\Plan;
use Illuminate\Support\Facades\Validator;


class PlanController extends Controller
{
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
        $plan = new Plan();
        $plan->name = $request->package_name;
        $plan->cost = $request->package_price;
        $plan->slug = strtolower($request->package_name);
        $plan->description = $request->package_description;
        $plan->stripe_plan = $request->stripe_plan;
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
