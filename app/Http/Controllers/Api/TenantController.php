<?php

namespace App\Http\Controllers\Api;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Config;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use App\Models\Api\Item;
use App\Tenant;
use App\User;
use App\Factories\TenantModelFactory;
use Illuminate\Support\Facades\Validator;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;


class TenantController extends Controller
{
    use UsesTenantConnection;

    public function __construct(){ }
    
    public function insert_data(Request $request)
    {
        return response()->json(['message'=>'data added'],200);
    }
    public function index(){
        $websites=Hostname::all()->where('user_id',auth()->user()->id);
        return view('tenantApps')->with('websites', $websites);
    }
    public function create(){
        return view('createApp');
    }
    public function store(Request $request){
        $request->request->add(['fqdn' => $request->subdomain .'.recoprism.com']); //add request
        $validator= Validator::make($request->all(),Tenant::rules());
        if(!$validator->fails()){
            Tenant::create(auth()->user(),$request->subdomain);
            return redirect('/applications');
        }else{
            return Redirect::back()->withErrors($validator);
        }
    }
}
