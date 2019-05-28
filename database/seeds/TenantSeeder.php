<?php

use Carbon\Carbon;
use App\Models\Tenant\IAV;
use App\Models\Tenant\UAV;
use App\Models\Tenant\Item;
use App\Models\Tenant\User;
use Illuminate\Support\Str;
use App\Models\Tenant\Entity;
use App\Models\Tenant\Rating;
use App\Models\Tenant\Purchase;
use Illuminate\Database\Seeder;
use App\Models\Tenant\Attribute;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $now;
    public function run()
    {
        $this->now = Carbon::now('utc')->toDateTimeString();
        Entity::insert(array(
            $this->create_entity('user'),
            $this->create_entity('item'),
        ));
        Attribute::insert(array(
            $this->create_attr('name',1),
            $this->create_attr('category',1),
            $this->create_attr('brand',1),
            $this->create_attr('price',1),
            $this->create_attr('name',2),
            $this->create_attr('email',2),           
            $this->create_attr('country',2),           
        ));
        $users = array();
        $items = array();
        $iav= [];
        $uav= [];
        for ($i=1; $i<11; $i++){
            $users [] = $this->create_model($i);
            for($j =1 ; $j<5; $j++){
                $iav [] = $this->create_eav('item', $i,$j, Str::random(5));
            }
            $items [] = $this->create_model($i);
            for($j =1 ; $j<4; $j++){
                $uav [] = $this->create_eav('user', $i,$j, Str::random(5));
            }
        }   
        User::insert($users);
        Item::insert($items);
        IAV::insert($iav);
        UAV::insert($uav);

        $ratings = [];
        $purchases=[];
        for($i =1; $i<25; $i++){
            $ratings [] =$this->create_rating();
            $purchases [] =$this->create_purchase();
        }
        Rating::insert($ratings);
        Purchase::insert($purchases);
    }

    function create_purchase(){
        return [
            'user_id'=>rand(1,10),
            'item_id'=>rand(1,10),
            'count'=>rand(1,5),
            'created_at' => $this->now,
            'updated_at' => $this->now
        ];
    }
    function create_rating(){
        return [
            'user_id'=>rand(1,10),
            'item_id'=>rand(1,10),
            'value'=>rand(1,5),
            'created_at' => $this->now,
            'updated_at' => $this->now
        ];
    }

    function create_entity($name){
        return array(
            'name' => $name, 
            'created_at' => $this->now,
            'updated_at' => $this->now
        );
    }
    function create_attr($label, $id){
        return array(
            'label' => $label, 
            'entity_id'=>$id,
            'created_at' => $this->now,
            'updated_at' => $this->now
        );
    }
    function create_model($id){
        return array(
            'id' => $id, 
            'created_at' => $this->now,
            'updated_at' => $this->now
        );
    }

    function create_eav($entity,$entity_id,$attr_id,$value){
        return [
            "{$entity}_id"=>$entity_id,
            "attribute_id"=>$attr_id,
            "value"=>$value,
            'created_at' => $this->now,
            'updated_at' => $this->now
        ];
    }

    
    
}
