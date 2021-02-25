<?php
/*
 * THIS FEATURE CONTAIN
 * *********************
 * total brand clients
 * total brand categories
 * related brand categories
 * ************************
 */

namespace App\Features\Brand;

class Feature01
{

    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }


    public function totalClients($brand_id)
    {
        $query = "SELECT products.id AS productId,products.brand_id AS productBrandId,sold.product_id soldProdId,COUNT(sold.profit) AS totalClients FROM products
                  JOIN sold  ON sold.product_id = products.id
		          JOIN categories ON categories.id = products.category_id
                  WHERE  products.brand_id_id = $brand_id";

        $totalBrandClients = $this->db->link->query($query)->fetch();

        return $totalBrandClients['totalClients'];
    }

    public function totalCategories ($brand_id)
    {
        $query  = "SELECT COUNT(category_id) AS TotalCategories FROM products WHERE brand_id = $brand_id";
        $TotalCategories = $this->db->link->query($query)->fetch();

        if($TotalCategories) {
            return $TotalCategories;
        } else {
            return false;
        }
    }

    public function RelatedCategories ($brand_id)
    {
        $query = "SELECT categories.name,categories.id,products.brand_id,products.id as ProdId FROM products JOIN categories ON ProdId = categories.id
                  WHERE products.brand_id = $brand_id";

        $related_categories = $this->db->link($query)->fetchAll();

        if($related_categories) {
            return $related_categories;
        } else {
            return false;
        }
    }
}