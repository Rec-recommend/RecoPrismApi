<?php

namespace App\Http\Controllers\Tenant\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tenant\Recommendation;

class RecommendationController extends Controller
{
    public function recos(Request $req){
        $collection = explode(".",$req->route()->getName())[1];
        $rec = new Recommendation($collection);
        $validator = validator(["id"=> $req->id], $rec->rules());

        if($validator->fails()){
            return response()->json([
                'message' => "Bad request"
            ], 400);
        }
        

        $id = (integer) $req->id;
        $entity_id = str_singular($collection).'_id';
        $items = $rec->where($entity_id , $id)->pluck('items');
        $items = sizeof($items)>0 ? $items[0]: $items;

        return [
          'items' => $items
        ];
    }
}
