<?php

namespace App\Http\Controllers\Api;

use App\Models\Api\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Factories\TenantModelFactory;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Support\Facades\Config;

class TenantController extends Controller
{
    use UsesTenantConnection;
    // use JsonResponse;

    public function __construct()
    {
        // $this->middleware('check.apikey');
        // $this->middleware('tenancy.enforce');
    }
    public function insert_data(Request $request)
    {
            return response()->json(['message'=>'data added'],200);
    }
}
