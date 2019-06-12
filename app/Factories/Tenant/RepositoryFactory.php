<?php

namespace App\Factories\Tenant;
use App\Repositories\Tenant;

class RepositoryFactory
{
    public static function make($repository)
    {
        try {
            $repository = "App\\Repositories\\Tenant\\" . $repository . "Repository";
            return new $repository();
        } catch (Exception $e) {
            return false;
        }
    }
}
