<?php
namespace App\Models\Tenant;

use App\Models\Tenant\IAV;
use App\Models\Tenant\Item;
use Illuminate\Support\Facades\DB;

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

    public function store($items)
    {
        $eavs = [];
        $item_ids = [];
        $attr_label_to_id = [];

        foreach (Attribute::get(['id','label'])->toArray() as $attr) {
            $attr_label_to_id[$attr['label']] = $attr['id'];
        }

        foreach ($items as $item) {
            $item_ids [] = [ 'id'=> $item['id'] ];
            foreach ($item as $attr_label => $attr_value) {
                if($attr_label !== "id"){
                    $eavs [ ] = [
                        "item_id"=> $item["id"],
                        'attribute_id'=>$attr_label_to_id[$attr_label],
                        'value'=>$attr_value
                    ];
                }
            }
        }
        Item::insert($item_ids);
        IAV::insert($eavs);
    }
}

/*
    [
        { 'id':3,'title':'iphone','price':1000 } ===> 3,2(attr_id),'iphone'  --- 3,4(attr_id),1000
    ]
        [title => title_id in attributes table, ]
*/

        // $iav_sql  = "insert into iav";
        // $item_sql = "insert into items (id) values";

        // $test = [1,2,3];
        // dd($test);

        // $ids=[];
        // $sql = "insert into items (id) values";
        // $sql = $sql . "('" . $id . "'), ";
        // foreach($item_ids as $id_array){
        //     foreach($id_array as $id){
        //         $sql = $sql . "('" . $id . "'), ";
        //     }
        // }
        // $sql = substr($sql, 0, -2);

        // DB::statement($sql);
        // DB::insert('insert into iav (id, title, genres) values (?,?,?)', $eavs);


// $ids=[];
// $sql = 'insert into items (id) values';
// foreach($entity_ids as $id_ass_array){
//     foreach($id_ass_array as $id){
//         $ids[]=$id;
//         $sql = $sql . ' (?), ';
//     }
// }
// $sql = substr($sql, 0, -2);
// $ids = implode(",", $ids);
// var_dump($sql);
// var_dump($ids);
// DB::insert($sql, $ids);