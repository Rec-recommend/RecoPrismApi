<?php

namespace App\Http\Controllers\Tenant\Web;

use Illuminate\Http\Request;
use App\Models\Tenant\Item;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class ItemsController extends Controller
{
    public function show()
    {
        $items = DB::table('items')->paginate(5);
        return view('tenant/items')->with('items', $items);
    }
}
