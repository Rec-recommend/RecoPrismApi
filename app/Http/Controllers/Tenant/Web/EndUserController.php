<?php

namespace App\Http\Controllers\Tenant\Web;

use Illuminate\Http\Request;
use App\Models\Tenant\EndUser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

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
        $inputID = Input::get('userID');
        $end_user = EndUser::where('id', $inputID)->first();
        if ($end_user) {
            return view('tenant/userrecomendation')->with('end_user', $end_user);
        } else {
            return view('tenant/userrecomendation')->with('nfMsg', 'No Details found. Try to search again !');
        }
    }
}
