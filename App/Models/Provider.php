<?php

namespace App\Models;

use App\{ Interfaces\ICrud, traits\Check, traits\Data };


class Provider implements ICrud
{

    // traits
    use Check;
    use Data;

    // proprites
    private $db;
    private $args;

    private $type;
    private $fullname;
    private $phone;
    private $email;
    private $country;
    private $adress;



    // methods
    public function __construct($db)
    {
        $this->db = $db;
    }


    private function prepare_data($raw_data)
    {
        $data = $this->secure_data($raw_data);

        $this->type = $data['type'];
        $this->fullname = $data['fullname'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->country = $data['country'];
        $this->adress = $data['adress'];

        $this->args = [

            $this->type,
            $this->fullname,
            $this->phone,
            $this->email,
            $this->country,
            $this->adress

        ];
    }

    public function list()
    {
        return $this->db->select("providers","none","none","id","DESEC");
    }

    public function store($data)
    {
        $this->prepare_data($data);

        $Check = $this->CheckIfExist("phone",$this->phone,"providers");

        if($Check == false) {

            $insert = $this->db->insert("providers",$data,$this->args);
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
        return $this->db->select("providers","id",$id,"none","none");
    }

    public function update($by, $val, $data)
    {
        $this->prepare_data($data);

        $Check = $this->CheckIfExist($by,$val,"providers");

        if($Check == true) {

            $update = $this->db->update("providers",$data,$by,$val,$this->args);
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
        $Check = $this->CheckIfExist($by,$value,"providers");

        if($Check == true) {

            $delete = $this->db->delete("providers",$by,$value);
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