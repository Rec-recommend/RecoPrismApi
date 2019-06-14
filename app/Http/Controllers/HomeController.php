<?php

namespace App\Http\Controllers;

use App\Models\System\Plan;
use App\Models\Tenant\Item;
use Illuminate\Http\Request;
use App\Models\System\Client;
use App\Models\Tenant\Rating;
use App\Models\Tenant\EndUser;
use App\Models\Tenant\Purchase;
use Hyn\Tenancy\Models\Website;
use App\Models\Tenant\Attribute;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Facades\Config;

class Card
{
    public $title;
    public $vslue;
    public $icon;

    public function __construct($title, $value, $icon)
    {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
    }
}
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
        $cards = [];
        if (Config('auth.defaults.guard') === "tenant_admin") {
            $cards[] = new Card('Users', EndUser::count(), 'fas fa-users');
            $cards[] = new Card('Items', Item::count(), 'fas fa-bars');
            $cards[] = new Card('Requests', Item::count(), 'fa fa-sort');

            $attributes_done =  Attribute::all()->first();
            $items_done =  Item::all()->first();
            $end_users_done =  EndUser::all()->first();
            $rating_done =  Rating::all()->first();
            $purchase_done =  Purchase::all()->first();
            return view('dashboard', compact('cards', 'attributes_done', 'items_done', 'end_users_done', 'rating_done', 'purchase_done'));
        }
        $cards[] = new Card('Clients', Client::count(), 'fas fa-users');
        $cards[] = new Card('Subscriptions', Subscription::count(), 'fas fa-bars');
        $cards[] = new Card('Plans', Plan::count(), 'fas fa-bars');
        return view('dashboard',compact('cards'));
    }
}
