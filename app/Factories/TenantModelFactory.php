<?php

namespace App\Factories;
use App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class TenantModelFactory
{
    public static function create($model)
    {
        try {
            $model =  "App\\Models\\Api\\".$model;
            $model_class = new $model();
            return $model_class;
        } catch (Exception $e) {
            return false;
        }
    }
}
