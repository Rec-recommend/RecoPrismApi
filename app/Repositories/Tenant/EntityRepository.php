<?php
namespace App\Models\Tenant;

abstract class EntityRepository
{
    protected $entity_id; //id 
    protected $entity_name; // string
    protected $entity_model;  //class
    protected $entity_eav; // class

    protected function __construct()
    {  
    }

    public function all()
    {
        
    }

    public function store($entities)
    {
        $eavs = [];
        $entity_ids = [];
        $attr ["id"]= NULL;
        $attributes = Attribute::where('entity_id',$this->entity_id)->get(['id','label'])->toArray();
        foreach ($attributes as $key => $value) {
            $attr[$value['label']] = $value['id'];
        }
         foreach ($entities as $key => $entity) {
            $entity_ids [] = [
                "id"=>$entity['id']
            ];
            foreach ($entity as $key => $value) {
                if($key !== "id"){
                    $eavs [ ] = [ 
                        $this->entity_name."_id"=>$entity["id"],
                        'attribute_id'=>$attr[$key],
                        'value'=>$value 
                    ];
                }
            }
        }
        $this->entity_model::insert($entity_ids);
        $this->entity_eav::insert($eavs);
    }
}
