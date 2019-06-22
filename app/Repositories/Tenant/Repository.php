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
        return DB::transaction(function () use ($data, $headers) {
            try {
                $len = sizeof($data);
                if($len > 500000)
                {
                    $chunk_size = ceil(sizeof($data)/20);
                    foreach (array_chunk($data, $chunk_size) as $data_chunk)
                    {
                        $this->transaction($data_chunk, $headers);
                    }
                }
                else
                {
                    $this->transaction($data, $headers);
                }
                return true;
            } catch (\Throwable $th) {
                // dd($th);
                return false;
            }
        });
    }

    abstract public function transaction($data, $headers);
}