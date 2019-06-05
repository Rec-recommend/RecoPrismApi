<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Models\System\PaymentPlan;
use App\Http\Controllers\Controller;
use App\Models\System\Registration;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    public function index(Request $request){
        $selected_plan= $request->input('plan');
        $plans = PaymentPlan::all();
        return view('guest.register',compact('plans', 'selected_plan'));
    }


    public function store(Request $request){
        $data = $request->except(['_token']);
        $user =  Registration::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'payment_plan_id' => $data['payment_plan_id'],
            'subdomain' => $data['subdomain']
        ]);
    }

}
