<?php

namespace App\Models;

use App\{ Interfaces\ICrud, traits\Crud,traits\Check, traits\Data };
use App\Features\Order\Feature01 as OrderFeature01;

class Order implements  ICrud
{

    // traits
    use Check;
    use Data;
    use Crud;

    // proprites
    private $db;
    private $args;
    private $OrderFeature01;

    private $client_id;
    private $products;
    private $quantities;
    private $discount;
    private $vat;
    private $total;
    private $status;


    public function __construct($db)
    {
        $this->db = $db;
        $this->OrderFeature01 = new OrderFeature01();
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
        $this->status = $data['status'];

        $this->args = [

            $this->client_id,
            $this->products,
            $this->quantities,
            $this->discount,
            $this->vat,
            $this->total,
            $this->status

        ];
    }


    public function list()
    {
        return $this->list_data("orders","id","DESC",$this->db);
    }

    public function store($data)
    {
        // do insert order
        $this->prepare_data($data);
        $this->store_data("orders","none","none",$this->args,$data,$this->db);

        // do single order insert
        $order_id = $this->db->link->lastInsertId();
        $order_type = $this->OrderFeature01->CheckOrderType($this->client_id,$this->db);
        $order_data = $this->OrderFeature01->prepareSingleOrder($order_type,$order_id,$data,$this->db);

        $this->OrderFeature01->insertSingleOrder($order_data,$order_type,$this->db);

        // do final order setup
        return $this->OrderFeature01->setUpOrder($order_type,$order_id,$this->vat,$this->discount,$this->db);
    }


    public function edit($id)
    {
        return $this->edit_data("orders","id",$id,"id","DESC",$this->db);
    }

    public function update($by, $val, $data)
    {
        // do update order
        $this->prepare_data($data);
        $this->update_data("orders",$by,$val,$data,$this->args,$this->db);

        // do update single order
        $order_id = $this->db->link->query("SELECT id FROM orders WHERE $by = '$val'")->fetch();
        $order_type = $this->OrderFeature01->CheckOrderType($this->client_id,$this->db);
        $order_data = $this->OrderFeature01->prepareSingleOrder($order_type,$order_id,$data,$this->db);

        $this->OrderFeature01->updateSingleOrder($order_data,$order_type,$this->db);

        // do final order setup
        return $this->OrderFeature01->setUpOrder($order_type,$order_id,$this->vat,$this->discount,$this->db);
    }

    public function delete($by, $value)
    {
        // do delete single order
        $client_id = $this->db->link->query("SELECT client_id FROM orders WHERE $by = '$value'")->fetch();
        $order_type = $this->OrderFeature01->CheckOrderType($client_id,$this->db);
        $order_id = $this->db->link->query("SELECT id FROM orders WHERE $by = '$value'")->fetch();
        $this->OrderFeature01->deleteSingleOrder($order_id,$order_type,$this->db);

        // do delete order
        $this->delete_data("orders",$by,$value,$this->db);
    }
}