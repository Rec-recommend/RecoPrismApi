<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Object_;

class Item extends Model
{
    protected $fillable = ['id','price,category_A','category_B','category_C','category_D',
     'category_E','tags','description','field_1','field_2','field_3','field_4','field_5'];
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
        // $data =  ["category_A"=>"aeme", "category_B"=>"a121eme",];  
    }
}
