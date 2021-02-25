<?php
/**
 * THIS FEATURE CONTAINS
 * *********************
 * Products In Depot
 * Total Products In Depot
 * Depot Value
 * *********************
 */

namespace App\Features\Depot;


class Feature01
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function InDepot ($depot_id)
    {
        // depots data
        $depot_data = $this->db->select("depots","id",$depot_id,"none","none");

        $productsInDepot = $depot_data['products'];

        // query
        $productsInDepotData = $this->db->selectByOperator("products","id","IN","($productsInDepot)","none","none");

        if($productsInDepot) {
            return $productsInDepot;
        } else {
            return false;
        }

    }

    public function TotalProductsInDepot ($depot_id)
    {
        // depots data
        $depot_data = $this->db->select("depots","id",$depot_id,"none","none");

        $productsInDepot = array_map(trim,explode(",",$depot_data['products']));

        return count($productsInDepot);

    }

    public function DepotValue ($depot_id)
    {
        // depots data
        $depot_data = $this->db->select("depots","id",$depot_id,"none","none");

        $productsInDepot = $depot_data['products'];

        // query
        $query = "SELECT SUM(price) FROM products WHERE id IN ($productsInDepot)";

        $depot_value = $this->db->link->query($query);

        return $depot_value;
    }




}