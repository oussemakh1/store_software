<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 2/6/2021
 * Time: 1:37 PM
 */

namespace App\Models;

use App\{Interfaces\ICrud, traits\Crud, traits\Data, traits\Check };

class User implements ICrud
{

    use Check;
    use Data;
    use Crud;

    private $db;
    private $args;

    private $username;
    private $fullname;
    private $password;
    private $type;
    private $created_at;


    public function __construct($db)
    {
        $this->db = $db;
    }

    private function prepare_data(array $raw_data)
    {
        $data = $this->secure_data($raw_data);

        $this->username = $data['username'];
        $this->fullname = $data['fullname'];
        $this->password = password_hash($data['password'], PASSWORD_BCRYPT);
        $this->type = $data['type'];
        $this->created_at = $data['created_at'];

        $this->args = [

            $this->username,
            $this->fullname,
            $this->password,
            $this->type,
            $this->created_at

        ];

    }


    public function list()
    {
        return $this->list_data("users","id","DESC",$this->db);
    }

    public function store($data)
    {
        $this->prepare_data($data);
        return $this->store_data("users","username",$this->username,$this->args,$data,$this->db);
    }

    public function edit($id)
    {
        return $this->edit_data("users","id",$id,"id","DESC",$this->db);
    }

    public function update($by,$val,$data)
    {
        $this->prepare_data($data);
        return $this->update_data("users",$by,$val,$data,$this->args,$this->db);
    }

    public function delete($by,$value)
    {
        return $this->delete_data("users",$by,$value,$this->db);
    }

}