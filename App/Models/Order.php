<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 2/1/2021
 * Time: 6:22 PM
 */

namespace App\Models;

use App\{ Interfaces\ICrud, traits\Check, traits\Data };


class Order implements  ICrud
{

    // traits
    use Check;
    use Data;

    // proprites
    private $db;
    private $args;

    private $client_id;
    private $products;
    private $quantities;
    private $discount;
    private $vat;
    private $total;


    public function __construct($db)
    {
        $this->db = $db;
    }

    private function prepare_data($raw_data)
    {
        $data = $this->secure_data($raw_data);

        $this->client_id = $data['client_id'];
        $this->products = $data['products'];
        $this->quantities = $data['quantities'];
        $this->discount = $data['discount'];
        $this->vat = $data['vat'];
        $this->total = $data['total'];

        $this->args = [

            $this->client_id,
            $this->products,
            $this->quantities,
            $this->discount,
            $this->vat,
            $this->total

        ];
    }


    public function list()
    {
        return $this->db->select("orders","none","none","id","DESC");
    }

    public function store($data)
    {
        $this->prepare_data($data);

        $insert = $this->db->insert("orders",$data,$this->args);

        if($insert) {
            return true;
        } else {
            return false;
        }
    }


    public function edit($id)
    {
        $Check = $this->CheckIfExist("id",$id,"orders");
        if($Check == true) {
            $edit = $this->db->select("orders","id",$id,"id","DESC");
            if($edit) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function update($by, $val, $data)
    {
        $this->prepare_data($data);

        $Check = $this->CheckIfExist($by,$val,"orders");
        if($Check == true){

            $update = $this->db->update("orders",$data,$by,$val,$this->args);
            if($update) {
                return true;
            } else {
                return false;
            }
        }else {
            return false;
        }
    }

    public function delete($by, $value)
    {
        $Check = $this->CheckIfExist($by,$value,"orders");
        if($Check == true) {
            $delete = $this->db->delete("orders",$by,$value);
            if($delete) {
                return true;
            } else {
                return false;
            }
        }
    }
}