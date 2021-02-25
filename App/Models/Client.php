<?php


namespace App\Models;

use App\{ Interfaces\ICrud, traits\Crud,traits\Check, traits\Data };

class Client implements  ICrud
{
    // traits
    use Check;
    use Data;
    use Crud;

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
        return $this->list_data("clients","id","DESC",$this->db);
    }

    public function store($data)
    {
        $this->prepare_data($data);
        return $this->store_data("clients","phone",$this->phone,$this->args,$data,$this->db);
    }

    public function edit($id)
    {
        return $this->edit_data("clients","id",$id,"DESC",$this->db);
    }

    public function update($by, $val, $data)
    {
        $this->prepare_data($data);
        return $this->update_data("clients",$by,$val,$data,$this->args,$this->db);
    }

    public function delete($by, $value)
    {
        return $this->delete_data("clients",$by,$value,$this->db);
    }
}