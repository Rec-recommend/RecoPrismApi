<?php

namespace App\Http\Controllers\Api\Tenant;

use Illuminate\Http\Request;
use App\Repositories\Tenant\ItemRepository;

class ItemController
{
    public function __construct(ItemRepository $item)
    {
        $this->repository = $item;
    }

    public function store(Request $request)
    {
        // if ($request->hasFile('csvfile')) {
        //     $path = $request->file('csvfile')->getRealPath();
        //     $array = array_map('str_getcsv',file($path));
        // }

        $this->repository->store($request->all());
        return response()->json([
            'message' => "Data added successfully"
        ], 201);
    }
}
