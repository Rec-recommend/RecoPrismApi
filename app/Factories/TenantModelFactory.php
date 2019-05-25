<?php

namespace App\Factories;

use Illuminate\Database\Eloquent\Model;

class TenantModelFactory
{
    public static function create($model)
    {
        // dd($model);
        try {
            $model =  "App\\Models\\Api\\".$model;
            $model_class = new $model();
            return $model_class;
        } catch (Exception $e) {
            return false;
        }
    }
}
