<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 2/6/2021
 * Time: 11:31 AM
 */

namespace App\traits;


trait OrdersReport
{
    public function OrdersReport ($id)
    {
        // query
        $query = "SELECT COUNT(client_id) AS total_orders, SUM(total) AS money ,SUM(quantites) AS total_quantites
                  FROM orders WHERE client_id = $id";
        $Report = $this->db->link->query($query)->fetch();

        if($Report) {
            return $Report;
        } else {
            return false;
        }
    }
}