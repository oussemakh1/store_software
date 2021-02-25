<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 2/6/2021
 * Time: 11:24 AM
 */

namespace App\traits;


trait OrdersHistory
{

    public function OrdersHistory ($id)
    {
        $OrdersList = array();

        // query
        $query = "SELECT id,total,created_at,quantites,products FROM orders WHERE client_id = $id";

        $OrdersData = $this->db->link->query($query)->fetchAll();

        $products_id = $OrdersData['products'];

        // query
        $query = "SELECT name FROM products WHERE id IN $products_id LIMIT 4";

        $productsNames = $this->db->link->query($query)->fetchAll();

        array_push($OrdersList, $productsNames);
        array_push($OrdersList, $OrdersList);

        if(sizeof($OrdersList) > 0) {
            return $OrdersList;
        } else {
            return false;
        }
    }

}