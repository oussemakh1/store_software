<?php

/**
 * THIS FEATURE CONTAIN
 * *********************
 * Expired Products
 * Products Close To Expire
 * Low Quantity Products
 * Most Sold Products
 * Less Sold Products
 * Total Costs
 * Total Profits
 * Total Clients
 * Product Profit
 * Product Cost
 * Product Clients
 * Product Providers
 * ********************
 */


namespace App\Features\Products;

class Feature01
{

    private $db;
    private $current_date;


    public function __construct($db)
    {
        $this->db;
        $this->current_date = date();
    }

    public function Expired()
    {
        $expired_products = $this->db->selectByOperator("products","expiration_date",">",$this->current_date,"id","DESC");

        if($expired_products) {
            return $expired_products;
        } else {
            return false;
        }
    }

    public function Closexpire($selector, $num)
    {
        // query
        $query = "SELECT * FROM products WHERE expiration_date = DATEADD($selector,$num, GETDATE()) ORDER BY id DESC ";
        $result = $this->db->link->query($query);
        if($result) {
            return $result->fetchAll();
        } else {
            return false;
        }

    }

    public function Loquantity($min)
    {
        $getLowQ = $this->db->selectByOperator("products","quantity","<=",$min,"id","DESC");
        if($getLowQ) {
            return $getLowQ;
        } else {
            return false;
        }
    }

    public function MoSolde()
    {
        /// query
        $query = "SELECT product_id, COUNT(product_id) AS MOSTSOLD FROM sold GROUP BY product_id ORDER BY COUNT(product_id) DESC";

        // execute
        $Mosold = $this->db->link($query);
        if($Mosold) {
            return $Mosold->fetchAll();
        } else {
            return false;
        }
    }

    public function LeSold()
    {
        /// query
        $query = "SELECT product_id, COUNT(product_id) AS MOSTSOLD FROM sold GROUP BY product_id ORDER BY COUNT(product_id) ASC";

        // execute
        $Mosold = $this->db->link($query);
        if($Mosold) {
            return $Mosold->fetchAll();
        } else {
            return false;
        }
    }

    public function Cost()
    {

        // query
        $query = "SELECT COUNT('total') FROM orders WHERE type = 'provider'";

        //execute
        $TotalCost = $this->db->link->query($query);

        if($TotalCost) {
            return $TotalCost->fetch();
        } else {
            return false;
        }

    }

    public function Profit()
    {
        // query
        $query = "SELECT SUM(total) from orders WHERE type = 'client' ";

        //execute
        $TotalProfit = $this->db->link->query($query);

        if($TotalProfit) {
            return $TotalProfit->fetch();
        } else {
            return false;
        }
    }

    public function ProfitByProduct($prod_id)
    {
        // query
        $query = "SELECT SUM(total) from sold WHERE  product_id = $prod_id ";

        //execute
        $TotalProfit = $this->db->link->query($query);

        if($TotalProfit) {
            return $TotalProfit->fetch();
        } else {
            return false;
        }
    }

    public function CostByProduct($prod_id)
    {
        // query
        $query = "SELECT SUM(total) FROM buy WHERE product_id = $prod_id";

        $execute = $this->db->link->query($query)->fetch();

        if($execute) {
            return $execute;
        }  else {
            return false;
        }
    }

    public function ProdTotalClients ($product_id)
    {
        // query
        $TotalClients = $this->db->link->query("SELECT product_id,COUNT(product_id) AS total_clients FROM sold WHERE product_id = $product_id")->fetch();
        if($TotalClients) {
            return $TotalClients;
        } else {
            return false;
        }
    }

    public function getProdProviders($product_id)
    {
        // query
        $query = "SELECT orders.client_id, providers.fullname,buy.quantity,buy.buy_date, buy.cost FROM orders JOIN buy ON buy.order_id = orders.id 
                  JOIN providers
                  ON providers.id = orders.client_id
                  WHERE buy.product_id = $product_id
                  ";
        $execute = $this->db->link->query($query)->fetchAll();

        $providers = array();
        if($execute) {
            foreach($execute as $key => $value) {

                $provider = array (
                    $key => $value
                );

                array_push($providers,$provider);
            }

            return $providers;
         } else {
            return false;
        }

    }

    public function getProdClients($product_id)
    {
        // query
        $query = "SELECT orders.client_id, clients.fullname,sold.quantity,sold.sold_date, sold.profit FROM orders JOIN sold ON sold.order_id = orders.id 
                  JOIN clients
                  ON clients.id = orders.client_id
                  WHERE sold.product_id = $product_id
                  ";
        $execute = $this->db->link->query($query)->fetchAll();

        $clients = array();
        if($execute) {
            foreach($execute as $key => $value) {

                $client = array (
                    $key => $value
                );

                array_push($clients,$clients);
            }

            return $clients;
        } else {
            return false;
        }

    }

}