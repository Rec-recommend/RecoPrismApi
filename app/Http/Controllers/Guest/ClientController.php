<?php

namespace App\Http\Controllers\Guest;

use App\Models\System\Plan;
use Illuminate\Http\Request;
use App\Models\System\client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class ClientController extends Controller
{
    public function create(Request $request){
        $selected_plan= $request->input('plan');
        $plans = Plan::all();
        return view('guest.create',compact('plans', 'selected_plan'));
    }


    public function store(Request $request){
        $request['password']=Hash::make($request['password']);
        $client =  Client::create($request->all());
        dd(Hash::check(Client::all()->last()->secret(), $client->hashed()));
    }
}
