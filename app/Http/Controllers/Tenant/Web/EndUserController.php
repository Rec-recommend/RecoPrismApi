<?php

namespace App\Http\Controllers\Tenant\Web;

use App\Models\Tenant\IAV;
use Illuminate\Http\Request;
use App\Models\Tenant\EndUser;
use App\Models\Tenant\Attribute;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Recommendation;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class EndUserController extends Controller
{
    public function show()
    {
        $perPage = request('perPage', 15);
        $end_users = DB::table('end_users')->paginate($perPage);
        return view('tenant/endusers')->with('end_users', $end_users);
    }

    public function search()
    {
        $attributes = Attribute::select('label')->get();
        $inputID = Input::get('userID');
        $ID = (integer)$inputID;
        $end_user = EndUser::where('id', $inputID)->first();
        $rec = new Recommendation('users');
        try {
            $items = $rec->where("user_id", $ID)->pluck('items')->first();
            $items_value = IAV::select('item_id', 'value')->whereIn('item_id', $items)->get();
            return view('tenant/userrecomendation')->with('end_user', $end_user)
                ->with('items', $items)
                ->with('items_value', $items_value)
                ->with('attributes', $attributes);
        } catch (\Throwable $th) {
            return Redirect::back()
                ->with(['message' => 'No Details found. Try to search again !', 'success' => false]);
        }
    }
}
