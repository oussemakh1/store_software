<?php

require "../../vendor/autoload.php";

use App\{ Database\MysqlDB, Models\Product };

class ProductTest
{

    private $db;
    private $product;

    public function __construct()
    {
        $this->db = new MysqlDB();
        $this->product = new Product($this->db);
    }




    public function testListData()
    {
        return $this->product->list();
    }


    public function testEditData()
    {
        return $this->product->edit('4');
    }

    public function testStoreData()
    {
        $data = array (

            "provider_id" => 2,
            "category_id" => 5,
            "brand_id" => 7,
            "quantity" => 12,
            "name" => "iphone x11",
            "size" => "",
            "weight" => "",
            "description" => "new phone generation!",
            "cost" => 900,
            "price" => 1200,
            "expiration_date" => ""

        );

        return $this->product->store($data);

    }


    public function testUpdateData()
    {
        $data = array (

            "provider_id" => 2,
            "category_id" => 5,
            "brand_id" => 7,
            "quantity" => 12,
            "name" => "samsung lite7",
            "size" => "",
            "weight" => "",
            "description" => "new phone generation!",
            "cost" => 900,
            "price" => 1200,
            "expiration_date" => ""

        );

        return $this->product->update('id','3',$data);
    }


    public function testDeleteData()
    {

        return $this->product->delete('id','3');

    }

}

$test = new ProductTest();

//$store = $test->testStoreData();
//if($store == true) { echo ' store done!'; }else { echo 'store not done!'; }

//$update = $test->testUpdateData();
//if($update == true) { echo ' update done!'; } else { echo 'update not done!'; }


//$delete = $test->testDeleteData();
//if($delete == true) { echo ' delete done!'; } else { echo 'delete not done!'; }

//$list = $test->testListData();
//print_r($list->fetchAll());

$edit = $test->testEditData();
print_r($edit);