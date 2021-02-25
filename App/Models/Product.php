<?php

namespace App\Models;

use App\{ Interfaces\ICrud, traits\Crud, traits\Check, traits\Data };


class Product implements ICrud
{

    // traits
    use Check;
    use Data;
    use Crud;

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
        return $this->list_data("product","id","DESC",$this->db);
    }

    public function store($data)
    {
        $this->prepare_data($data);
        return $this->store_data("products","name",$this->name,$this->args,$data,$this->db);
    }

    public function edit($id)
    {
        return $this->edit_data("products","id",$id,"id","DESC",$this->db);
    }

    public function update($by,$val,$data)
    {
        $this->prepare_data($data);
        return $this->update_data("products",$by,$val,$data,$this->args,$this->db);
    }

    public function delete($by,$value)
    {
        return $this->delete_data("products",$by,$value,$this->db);
    }

}
