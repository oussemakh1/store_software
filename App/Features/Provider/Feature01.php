<?php
/*
 * THIS FEATURE CONTAIN
 * ********************
 * provider report
 * provider orders history
 * **********************
 */

namespace App\Features\Provider;

use App\traits\OrdersHistory;
use App\traits\OrdersReport;

class Feature01
{

    use OrdersHistory;
    use OrdersReport;

    private  $db;


    public function __construct($db)
    {
        $this->db = $db;
    }


    public function provider_report($provider_id)
    {
        return $this->OrdersReport($provider_id);
    }

    public function provider_order_list($provider_id)
    {
        return $this->OrdersHistory($provider_id);
    }

}