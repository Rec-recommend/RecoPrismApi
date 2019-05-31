<?php 
namespace App\Repositories\Tenant;

use App\Models\Tenant\Item;
use App\Models\Tenant\Entity;
use App\Models\Tenant\Attribute;
use App\Models\Tenant\IAV;
use App\Models\Tenant\EntityRepository;

class ItemRepository  extends EntityRepository
{
    public function __construct()
    {
        $this->entity_id = 1;
        $this->entity_name = "item";
        $this->entity_model = \App\Models\Tenant\Item::class;
        $this->entity_eav = \App\Models\Tenant\IAV::class;
    }
   
    // public function store($items)
    // {
    //     $eavs = [];
    //     $item_ids = [];
    //     $attr ["id"]= NULL;
    //     $attributes = Attribute::where('entity_id',1)->get(['id','label'])->toArray();
    //     foreach ($attributes as $key => $value) {
    //         $attr[$value['label']] = $value['id'];
    //     }
    //      foreach ($items as $key => $item) {
    //         $item_ids [] = [
    //             "id"=>$item['id']
    //         ];
    //         foreach ($item as $key => $value) {
    //             if($key !== "id"){
    //                 $eavs [ ] = [ 
    //                     "item_id"=>$item["id"],
    //                     'attribute_id'=>$attr[$key],
    //                     'value'=>$value 
    //                 ];
    //             }
    //         }
    //     }
    //     Item::insert($item_ids);
    //     IAV::insert($eavs);
    // }
}