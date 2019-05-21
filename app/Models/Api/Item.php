<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['id','price,category_A','category_B','category_C','category_D',
     'category_E','tags','description','field_1','field_2','field_3','field_4','field_5'];

}
