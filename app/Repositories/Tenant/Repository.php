<?php
namespace App\Repositories\Tenant;

use Illuminate\Support\Facades\DB;

abstract class Repository
{
    public function store($data)
    {
        $headers = $data[0];
        $headers = array_flip($headers);
        unset($data[0]);
        DB::transaction(function () use ($data, $headers) {
            try {
                $this->transaction($data, $headers);
                //code...
                return true;

            } catch (\Throwable $th) {
                //throw $th;
                return false;
            }
        });
    }

    abstract public function transaction($data, $headers);
}