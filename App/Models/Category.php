<?php


namespace App\Models;

use App\{ Interfaces\ICrud, traits\Crud,traits\Check, traits\Data };


class Category implements ICrud
{

    // traits
    use Check;
    use Data;
    use Crud;

    // proprites
    private $db;
    private $args;
    private $name;

    // methods
    public function __construct($db)
    {
        $this->db = $db;
    }

    private function prepare_data($raw_data)
    {
        $data = $this->secure_data($raw_data);

        $this->name = $data['name'];

        $this->args = [$this->name];
    }


    public function list()
    {
        return $this->list_data("categories","id","DESC",$this->db);
    }

    public function store($data)
    {
        $this->prepare_data($data);
        return $this->store_data("categories","name",$this->name,$this->args,$data,$this->db);
    }

    public function edit($id)
    {
        return $this->edit_data("categories","id",$id,"id","DESC",$this->db);
    }

    public function update($by, $val, $data)
    {
        $this->prepare_data($data);
        return $this->update_data("categories",$by,$val,$data,$this->args,$this->db);
    }

    public function delete($by, $value)
    {
        return $this->delete_data("categories",$by,$value,$this->db);
    }
}