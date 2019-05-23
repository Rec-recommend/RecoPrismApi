<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\Item;
use App\Factories\TenantModelFactory;
use App\Traits\JsonResponse;

class TenantController extends Controller
{
    // use JsonResponse;

    public function insert_data(Request $request)
    {
        if ($model = TenantModelFactory::create($request->model)) {
            $model->insert($request->data);
            return response()->json(['success'=>true,'data' => $data, 'message'=>$message], $code);
        
        // return $this->success("Items inserted", 201);
        } else {
            return response()->json(['success'=>false,'errors' => $errors, 'message'=>$message], $code);

            // return $this->fail("Bad model name", 400);
        }
    }
}
