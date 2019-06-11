<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant\Attribute;
use App\Models\Tenant\Item;
use App\Models\Tenant\EndUser;
use App\Models\Tenant\Rating;
use App\Models\Tenant\Purchase;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Config('auth.defaults.guard')=== "tenant_admin") {
            $attributes_done =  Attribute::all()->first();
            $items_done =  Item::all()->first();
            $end_users_done =  EndUser::all()->first();
            $rating_done =  Rating::all()->first();
            $purchase_done =  Purchase::all()->first();
            return view('dashboard', compact('attributes_done', 'items_done', 'end_users_done', 'rating_done', 'purchase_done'));
        }
        return view('dashboard');
    }
}
