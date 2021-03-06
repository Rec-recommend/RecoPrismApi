<?php

namespace App\Http\Controllers\Tenant\Web;

use Illuminate\Http\Request;
use App\Models\Tenant\Attribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class AttributeController extends Controller
{
    use UsesTenantConnection;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Config::set('database.default', 'tenant');
        $attributes = Attribute::all();
        // dd($attributes);
        return view('attributes')->with('attributes', $attributes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addAttributes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = [];
        $attributes_weights = $request->all();
        $index = 0;
        foreach ($attributes_weights as $key => $value) {
            $index++;
            if ($index % 2 == 0) {
                $weight =$attributes_weights[$key . "_weight"];
                $attribute = [
                    "label" => $value,
                    'weight' => ($weight)? $weight : 1
                ];
            $validator = Validator::make($attribute,Attribute::rules());
            if ($validator->fails()) {
                return redirect('attributes/create')
                            ->withErrors($validator)
                            ->withInput();
            }
            else{
                $attributes [] = $attribute;
            }

            }
        }
        Attribute::insert($attributes);
        return redirect('/attributes');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::find($id);
        $attribute->delete();
        return redirect('/attributes');
    }
}
