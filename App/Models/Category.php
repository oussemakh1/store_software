<?php


namespace App\Models;

use App\{ Interfaces\ICrud, traits\Check, traits\Data };


class Category implements ICrud
{

    // traits
    use Check;
    use Data;

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
        return $this->db->select("categories","none","none","id","DESC");
    }

    public function store($data)
    {

        $this->prepare_data($data);
        $Check = $this->CheckIfExist("name",$this->name,"categories");
        if($Check == false) {
            $insert = $this->db->insert("categories",$data,$this->args);

            if($insert) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }


    }

    public function edit($id)
    {
        return $this->db->select("categories","id",$id,"DESC");
    }

    public function update($by, $val, $data)
    {
        $this->prepare_data($data);
        $Check = $this->CheckIfExist($by,$val,"categories");

        if($Check == true) {

            $update = $this->db->update("categories",$data,$by,$val,$this->args);
            if($update) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete($by, $value)
    {
        $Check = $this->CheckIfExist($by,$value,"categories");

        if($Check == true) {

            $delete = $this->db->delete("categories",$by,$value);

            if($delete) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}