<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\Item;

class TenantController extends Controller
{
    public function show()
    {
        return Item::all();
    }
}
