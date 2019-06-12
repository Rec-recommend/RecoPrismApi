<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';
    protected $fillable = [
        'name', 'cost', 'description', 'slug', 'stripe_plan'
    ];
    public static function rules()
    {
        return [
            'name' => 'required|unique:plans|min:4',
            'cost' => 'required|numeric|min:0',
            'description' => 'required|min:10',
            'slug' => 'required|unique:plans|min:4',
            'stripe_plan' => 'required|regex:/^plan.*$/|min:19|max:19',
        ];
    }
}
