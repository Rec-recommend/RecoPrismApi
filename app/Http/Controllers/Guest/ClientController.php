<?php

namespace App\Http\Controllers\Guest;

use App\Models\System\Plan;
use Illuminate\Http\Request;
use App\Models\System\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Hyn\Tenancy\Models\Hostname;

class ClientController extends Controller
{
    public function create(Request $request){
        $selected_plan= $request->input('plan');
        $plans = Plan::all();
        return view('guest.register',compact('plans', 'selected_plan'));
    }


    public function store(Request $request){
        $validator = validator($request->all(),Client::rules());
        if ($validator->fails()){
            return  back()->withInput()->withErrors($validator);
        }
        $request['password']=Hash::make($request['password']);
        $client =  Client::create($request->all());
        $plan = Plan::where('id',$request['plan_id'])->first();
        return view('guest.subscribe',compact('plan','client'));
    }
}
