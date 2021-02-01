<?php


namespace App\Models;

use App\{ Interfaces\ICrud, traits\Check, traits\Data };


class Brand implements ICrud
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
        return $this->db->select("brands","none","none","id","DESC");
    }

    public function store($data)
    {

        $this->prepare_data($data);
        $Check = $this->CheckIfExist("name",$this->name,"brands");
        if($Check == false) {
            $insert = $this->db->insert("brands",$data,$this->args);

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
        return $this->db->select("brands","id",$id,"DESC");
    }

    public function update($by, $val, $data)
    {
        $this->prepare_data($data);
        $Check = $this->CheckIfExist($by,$val,"brands");

        if($Check == true) {

            $update = $this->db->update("brands",$data,$by,$val,$this->args);
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

        $Check = $this->CheckIfExist($by,$value,"brands");

        if($Check == true) {
            $delete = $this->db->delete("brands", $by, $value);

            if ($delete) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}