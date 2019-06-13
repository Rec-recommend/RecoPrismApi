<?php

namespace App\Models\Tenant;

use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Recommendation extends Eloquent
{
    protected $connection = 'mongodb';

    public function __construct($collection='',$attributes = array())
    {
        parent::__construct($attributes);
        $this->collection = DB::getDatabaseName() . '_' . $collection;
    }


    static public function rules()
    {
        return [
            'id' => 'integer',
        ];
    }

    public function scopeHideMongoid($query)
    {
        $query->getQuery()->projections = [ '_id'=> 0, ];

        return $query;
    }

}
