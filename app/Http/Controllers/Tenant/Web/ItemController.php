<?php

namespace App\Http\Controllers\Tenant\Web;

use App\Models\Tenant\IAV;
use Illuminate\Http\Request;
use App\Models\Tenant\EndUser;
use App\Models\Tenant\Item;
use App\Models\Tenant\Attribute;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Recommendation;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    public function show()
    {

        return view('tenant/items');
    }

    public function getItemRecommednations()
    {
        $attributes = Attribute::select('label')->get();
        $inputID = Input::get('itemID');
        $ID = (integer)$inputID;
        $item = Item::where('id', $inputID)->first();
        $item_rec = new Recommendation('items');
        try {
            $items = $item_rec->where("item_id", $ID)->pluck('items')->first();
            $items_value = IAV::select('item_id', 'value')->whereIn('item_id', $items)->get();
            return view('tenant/itemRecommendation')->with('item', $item)
                ->with('items', $items)
                ->with('items_value', $items_value)
                ->with('attributes', $attributes);
        } catch (\Throwable $th) {
            return Redirect::back()
                ->with(['message' => 'No Details found. Try to search again !', 'success' => false]);
        }
    }
}
