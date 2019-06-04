<?php

namespace App\Models\Tenant;

use App\Models\Tenant\IAV;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Constraint\Attribute;
use Hyn\Tenancy\Traits\UsesTenantConnection;

class Item extends Model
{
    use UsesTenantConnection;
    protected $fillable = ['entity_id'];
    protected $table='items';
    protected $rules = [
        'id' => 'unique'
    ];
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
        return $this->hasManyThrough(Attribute::class, IAV::class);
    }

    public function get_iav(){
        return $this->hasMany(IAV::class)->get(['id', 'value'])->toArray();
    }
    public function attributeValues(){
        return $this->hasMany(IAV::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
}
