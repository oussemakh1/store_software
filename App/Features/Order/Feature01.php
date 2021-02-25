<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 2/12/2021
 * Time: 11:37 AM
 */

namespace App\Features\Order;

use App\traits\Check;
use App\traits\Crud;
use App\traits\Data;

class Feature01
{
    use Check;
    use Data;
    use Crud;

    private $db;
    private $args;
    private $order_type;

    private $product_id;
    private $quantity;
    private $profit;
    private $cost;
    private $sold_date;
    private $buy_date;
    private $order_id;


    private function prepare_data($raw_data)
    {
        if($this->order_type == 'sold') {
            $data = $this->secure_data($raw_data);

            $this->product_id = $data['product_id'];
            $this->quantity = $data['quantity'];
            $this->profit = $data['profit'];
            $this->sold_date = $data['sold_date'];
            $this->order_id = $data['order_id'];

            $this->args = [

                $this->product_id,
                $this->quantity,
                $this->profit,
                $this->sold_date,
                $this->order_id

            ];
        } elseif($this->order_type == 'buy') {
            $data = $this->secure_data($raw_data);

            $this->product_id = $data['product_id'];
            $this->quantity = $data['quantity'];
            $this->cost = $data['cost'];
            $this->buy_date = $data['buy_date'];
            $this->order_id = $data['order_id'];

            $this->args = [

                $this->product_id,
                $this->quantity,
                $this->cost,
                $this->buy_date,
                $this->order_id

            ];
        }

    }

    public function CheckOrderType($client_id,$db)
    {
        // query
        $isProvider = $db->link->query("SELECT id FROM providers WHERE id = $client_id")->fetch();
        $isClient = $db->link->query("SELECT id FROM clients WHERE id = $client_id")->fetch();
        if($isProvider->rowCount() > 0)
        {
            return 'buy';
        } elseif($isClient->rowCount() > 0) {
            return 'sold';
        }
    }

    public function insertSingleOrder($data,$order_type,$db)
    {
        $this->prepare_data($data);
        return $this->store_data($order_type,"none","none",$this->args,$data,$db);
    }

    public function updateSingleOrder($data,$order_type,$db)
    {
        $this->prepare_data($data);
        return $this->update_data($order_type,"order_id",$this->order_id,$this->args,$db);
    }

    public function deleteSingleOrder($order_id, $order_type,$db)
    {
        return $this->delete_data($order_type,"order_id",$order_id,$db);
    }

    public function prepareSingleOrder($order_type,$order_id,$data,$db)
    {
        $products = array_map(trim,explode(",",$data['products']));
        $quantities = array_map(trim,exploade(",",$data['quantities']));
        $setOrder = array(
                "order_id" => $order_id
        );

        for($i=0;$i<= count($products);$i++)
        {

            if($order_type == 'sold')
            {
                $productPrice = $this->db->link->query("SELECT price FROM products WHERE id = $products[$i]")->fetch();

                for($i=0;$i<= count($products);$i++) {

                    $order_info = array (
                        "product_id" => $products[$i],
                        "quantity" => $quantities[$i],
                        "price" => $productPrice,
                        "profit" => ($productPrice * $quantities[$i])
                    );

                    array_push($setOrder,$order_info);
                }

            } elseif($order_type == 'buy') {
                $productCost = $this->db->link->query("SELECT cost FROM products WHERE id = $products[$i]")->fetch();

                for($i=0;$i<= count($products);$i++) {

                    $order_info = array (
                        "product_id" => $products[$i],
                        "quantity" => $quantities[$i],
                        "price" => $productCost,
                        "cost" => ($productCost * $quantities[$i])
                    );

                    array_push($setOrder,$order_info);

                }

                return $setOrder;
            }

        }
    }

    public function setUpOrder ($order_type,$order_id,$vat,$discount,$db)
    {
        $total_amount = $db->link->query("SELECT SUM(cost) FROM $order_type WHERE order_id = $order_id")->fetch();

        $total_after_discount = $total_amount * ( (100 - $discount) /100 );

        $total_grand = $total_after_discount  * (1 + ($vat / 100));

        return $setOrderTotal = $db->link->query("UPDATE orders SET total = '$total_grand' WHERE id = $order_id");
    }
}