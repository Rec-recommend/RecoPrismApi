<?php

namespace App\Models\Tenant;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Object_;
use PHPUnit\Framework\Constraint\Attribute;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Item extends Model
{
    use UsesTenantConnection;
    protected $table='items';
 
    public function setOptionsAttribute($options)
    {
        $this->attributes['options'] = json_encode($options);
    }

    public function insert_many($data)
    {
        // dd($data);
        // $data_arr = [];
        // Item::insert($data);    
        foreach ($data as $key => $value) {
            DB::table('items')->insert( $value);
        }
    }

    public function attributes(){
        return $this->hasManyThrough(Attribute::class, ItemAttributeValues::class);
    }

    public function attributeValues(){
        return $this->hasMany(ItemAttributeValues::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}
