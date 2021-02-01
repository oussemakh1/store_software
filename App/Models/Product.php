<?php

namespace App\Models;

use App\{ Interfaces\ICrud, traits\Check, traits\Data };


class Product implements ICrud
{

    // traits
    use Check;
    use Data;

    // proprites
    private $db;
    private $args = [];

    private $provider_id;
    private $category_id;
    private $brand_id;
    private $quantity;
    private $name;
    private $size;
    private $weight;
    private $description;
    private $cost;
    private $price;
    private $expiration_date;

    // methods
    public function __construct ($db)
    {
      $this->db = $db;
    }


    private function prepare_data(array $raw_data)
    {
      $data = $this->secure_data($raw_data);

      $this->provider_id =  $data['provider_id'];
      $this->category_id =  $data['category_id'];
      $this->brand_id = $data['brand_id'];
      $this->quantity = $data['quantity'];
      $this->name =  $data['name'];
      $this->size =  $data['size'];
      $this->weight =  $data['weight'];
      $this->description =  $data['description'];
      $this->cost =  $data['cost'];
      $this->price =  $data['price'];
      $this->expiration_date = $data['expiration_date'];

      $this->args = [

            $this->provider_id,
            $this->category_id,
            $this->brand_id,
            $this->quantity,
            $this->name,
            $this->size,
            $this->weight,
            $this->description,
            $this->cost,
            $this->price,
            $this->expiration_date

       ];

    }

    public function list()
    {
        $data = $this->db->select("products","none","none","id","DESC");

        if($data) {
          return $data;
        } else {
          return false;
        }
    }

    public function store($data)
    {

      // preapre Data
      $this->prepare_data($data);

     // check if exist
       $Exist = $this->CheckIfExist("name", $this->name, "products");
       if($Exist == false) {
         $insert = $this->db->insert("products",$data,$this->args);
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
        $data = $this->db->select("products","id", $id, "id", "DESC");

        if($data) {
          return $data;
        } else {
          return false;
        }
    }

    public function update($by,$val,$data)
    {
      // prepare Data
      $this->prepare_data($data);

      $Check = $this->CheckIfExist($by,$val,'products');

      if($Check == true) {

          // update
          $update = $this->db->update('products',$data,$by,$val,$this->args);

          if($update) {
              return true;
          } else {
              return false;
          }

      } else {
          return false;
      }
    }

    public function delete($by,$value)
    {
      $delete = $this->db->delete("products", $by, $value);

      if($delete) {
        return true;
      } else {
        return false;
      }

    }

}
