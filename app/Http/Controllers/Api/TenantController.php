<?php

namespace App\Http\Controllers\Api;

use App\Models\Api\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Factories\TenantModelFactory;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Config;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class TenantController extends Controller
{
    use UsesTenantConnection;

    public function __construct(){ }
    
    public function insert_data(Request $request)
    {
        return response()->json(['message'=>'data added'],200);
    }
}
