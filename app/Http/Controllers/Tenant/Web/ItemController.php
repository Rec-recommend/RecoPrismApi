<?php

namespace App\Http\Controllers\Tenant\Web;

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
        if ($request->hasFile('csvfile')) {
            $path = $request->file('csvfile')->getRealPath();
            $array = array_map('str_getcsv', file($path));
            $filtered = array_filter(array_map('array_filter', $array));
            $this->repository->store($filtered);
        }

        // $this->repository->store($request->all());
        return response()->json([
            'message' => "Data added successfully"
        ], 201);
    }

    public function import(){
        return view('importCSV');
    }
}
