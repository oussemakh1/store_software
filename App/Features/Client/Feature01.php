<?php
/*
 * THIS FEATURE CONTAINS
 * ***********************
 * Generate Invoice
 * Client Orders List
 * Client Report
 * ***********************
 */

namespace  App\Features\Client;

use App\traits\Invoice;
use App\traits\OrdersHistory;
use App\traits\OrdersReport;

class Feature01
{
    use Invoice;
    use OrdersHistory;
    use OrdersReport;

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function generate_invoice ($client_id, $order_id)
    {
       return  $this->Invoice($this->db,$client_id,$order_id,"clients");
    }

    public function client_order_list($client_id)
    {
        return $this->OrdersHistory($client_id);
    }

    public function client_report($client_id)
    {
        return $this->OrdersReport($client_id);
    }



}