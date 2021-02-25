<?php

namespace App\Models;

use App\{ Interfaces\ICrud, traits\Crud,traits\Check, traits\Data };


class Depot implements  ICrud
{

    use Check;
    use Data;
    use Crud;

    private $db;
    private $args;

    private $country;
    private $adress;
    private $size;
    private $products;
    private $cost;
    private $status;


    public function __construct($db)
    {
        $this->db = $db;
    }


    private function prepare_data($raw_data)
    {
        $data = $this->secure_data($raw_data);

        $this->country = $data['country'];
        $this->adress = $data['adress'];
        $this->size = $data['size'];
        $this->products = $data['products'];
        $this->cost = $data['cost'];
        $this->status = $data['status'];

        $this->args = [

            $this->country,
            $this->adress,
            $this->size,
            $this->products,
            $this->cost,
            $this->status

        ];
    }

    public function list()
    {
        return $this->list_data("depots","id","DESC",$this->db);
    }

    public function store($data)
    {
        $this->prepare_data($data);
        return $this->store_data("depots","adress",$this->adress,$this->args,$data,$this->db);
    }

    public function edit($id)
    {
        return $this->edit_data("depots","id",$id,"id","DESC",$this->db);
    }

    public function update($by, $val, $data)
    {
        $this->prepare_data($data);
        return $this->update_data("depots",$by,$val,$data,$this->args,$this->db);
    }

    public function delete($by, $value)
    {
        return $this->delete_data("depots",$by,$value,$this->db);
    }
}