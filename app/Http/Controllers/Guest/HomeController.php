<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System\PaymentPlan;

class HomeController extends Controller
{
    public function index(){
        $plans = PaymentPlan::all();
        return view('guest.landingPage')->with('plans', $plans);
    } 
}
