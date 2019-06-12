<?php

namespace App\Factories\Tenant;
use App\Models\Api;
use App\Models\Tenant as basenamespace;
use Illuminate\Database\Eloquent\Model;

class ModelFactory
{
    public static function create($model)
    {
        try {
            $model =  "App\\Models\\Api\\".$model;
            return new $model();
        } catch (Exception $e) {
            return false;
        }
    }
}
