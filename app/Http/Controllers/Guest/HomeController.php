<?php

namespace App\Http\Controllers\Guest;

use App\Models\System\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $plans = Plan::all();
        return view('guest.landingPage')->with('plans', $plans);
    } 
}
