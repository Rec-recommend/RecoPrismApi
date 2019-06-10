<?php

use App\User;
use Carbon\Carbon;
use App\Models\Tenant\IAV;
use App\Models\Tenant\Item;
use Illuminate\Support\Str;
use App\Models\Tenant\Rating;
use App\Models\Tenant\EndUser;
use App\Models\Tenant\Purchase;
use Illuminate\Database\Seeder;
use App\Models\Tenant\Attribute;
use App\Models\Tenant\TenantAdmin;
use App\Models\Tenant\Setting;

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

        Attribute::insert(array(
            $this->create_attr('name'),
            $this->create_attr('category'),
            $this->create_attr('brand'),
            $this->create_attr('price'),
            $this->create_attr('name'),
            $this->create_attr('email'),
            $this->create_attr('country'),
        ));
        $users = array();
        $items = array();
        $iav= [];
        for ($i=1; $i<=10; $i++){
            $items [] = $this->create_model($i);
            $users [] = $this->create_model($i);
            for($j =1 ; $j<5; $j++){
                $iav [] = $this->create_eav( $j, Str::random(5));
            }
        }
        EndUser::insert($users);
        Item::insert($items);
        IAV::insert($iav);

        $ratings = [];
        $purchases=[];
        for($i =1; $i<=10; $i++){
            $ratings [] =$this->create_rating($i);
            $purchases [] =$this->create_purchase($i);
        }
        Rating::insert($ratings);
        Purchase::insert($purchases);
    }
//-----------------------------------------------------------------------------------------------------
    function create_purchase($i){
        return [
            'end_user_id'=>$i,
            'item_id'=>$i,
            'count'=>rand(1,5),
            'created_at' => $this->now,
            'updated_at' => $this->now
        ];
    }
    function create_rating($i){
        return [
            'end_user_id'=>$i,
            'item_id'=>$i,
            'value'=>rand(1,5),
            'created_at' => $this->now,
            'updated_at' => $this->now
        ];
    }


    function create_attr($label){
        return array(
            'label' => $label,
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

    function create_eav($attr_id,$value){
        return [
            "attribute_id"=>$attr_id,
            "value"=>$value,
            'created_at' => $this->now,
            'updated_at' => $this->now
        ];
    }
}
