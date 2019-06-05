<?php

namespace App\Http\Controllers\System;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Config;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use App\Models\Api\Item;
use App\Tenant;
use App\Models\Common\Admin as User;;
use App\Factories\TenantModelFactory;
use Illuminate\Support\Facades\Validator;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;


class TenantController extends Controller
{
    use UsesTenantConnection;

    public function __construct()
    { }

    public function insert_data(Request $request)
    {
        if ($model = TenantModelFactory::create($request->model)) {
            $model->insert($request->data);
            return response()->json(['success' => true], 200);
            return success()->send();
            // return $this->success("Items inserted", 201);
        } else {
            // return response()->json(['success'=>false,'errors' => $errors, 'message'=>$message], $code);

            // return $this->fail("Bad model name", 400);
        }
    }
    public function index()
    {
        $websites = Hostname::all()->where('user_id', auth()->user()->id);
        return view('tenantApps')->with('websites', $websites);
    }
    public function create()
    {
        return view('createApp');
    }
    public function store(Request $request)
    {
        $request->request->add(['fqdn' => $request->subdomain . '.recoprism.com']); //add request
        $validator = Validator::make($request->all(), Tenant::rules());
        if (!$validator->fails()) {
            Tenant::create(auth()->user(), $request->subdomain);
            return redirect('/applications');
        } else {
            return Redirect::back()->withErrors($validator);
        }
    }

    public function delete($id)
    {
        $hostname = Hostname::where(['id' => $id, 'user_id' => auth()->user()->id])->first();
        $website = $hostname->website()->first();
        Tenant::delete($hostname, $website);
        return redirect('/applications');
    }
}
