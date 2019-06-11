<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Models\Tenant\Attribute;
use App\Models\Tenant\Item;
use App\Models\Tenant\EndUser;
use App\Models\Tenant\Rating;
use App\Models\Tenant\Purchase;

class TestController extends Controller
{
    public function index(){
        $attributes_done =  Attribute::all()->first();
        $items_done =  Item::all()->first();
        $end_users_done =  EndUser::all()->first();
        $rating_done =  Rating::all()->first();
        $purchase_done =  Purchase::all()->first();
        $output = shell_exec(base_path()."/recos.sh --host amin.recoprism.com ".base_path());
        // dd($output);
        return view('progress',compact('attributes_done','items_done','end_users_done','rating_done','purchase_done'));
    }
}
