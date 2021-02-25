<?php
/*
 * THIS FEATURE CONTAIN
 * ********************
 * category related products
 * category total profit
 * category total cost
 * category total clients
 * ********************
 */

namespace App\Features\Category;

use App\Models\Category;


class Feature01
{
    private $db;
    private $Category;
    private $ProductFeature01;

    public function __construct($db)
    {
        $this->db = $db;
        $this->Category = new Category($this->db);
        $this->ProductFeature01 = new \App\Features\Products\Feature01($this->db);
    }


    public function Prodelete($by, $val)
    {
        $delete_cat = $this->delete($by, $val);

        if($delete_cat) {
            $DeleteRelatedProd = $this->delete('products','category_id',$val);
            $DeleteOrderProd = $this->db->link->query("DELETE FROM orders WHERE $val IN products");
            $DeleteSoldProd  = $this->db->delete("sold",$by,$val);
        }
    }


    public function RelatedProducts ($cat_id)
    {
        // query
        $related_product = $this->db->link->query("SELECT * FROM products WHERE categroy_id = $cat_id")->fetchAll();
        if($related_product) {
            return $related_product;
        } else {
            return false;
        }
    }

    public function CatProfit($cat_id)
    {
        $query = "SELECT products.id AS productId,products.category_id AS productCatId,categories.*,sold.product_id soldProdId,SUM(sold.profit) AS totalProfit FROM products
                  JOIN sold  ON sold.product_id = products.id
		          JOIN categories ON categories.id = products.category_id
                  WHERE  products.category_id = $cat_id";

        $totalCatProfit = $this->db->link->query($query)->fetch();

        return $totalCatProfit['totalProfit'];
    }

    public function CatCost($cat_id)
    {
        $query = "SELECT products.id AS productId,products.category_id AS productCatId,categories.*,buy.product_id buyProdId,SUM(buy.cost) AS totalCost FROM products
                  JOIN buy  ON buy.product_id = products.id
		          JOIN categories ON categories.id = products.category_id
                  WHERE  products.category_id = $cat_id";

        $totalCatCost = $this->db->link->query($query)->fetch();

        return $totalCatCost['totalCost'];
    }

    public function CatTotalClients($cat_id)
    {
        $query = "SELECT products.id AS productId,products.category_id AS productCatId,categories.*,sold.product_id soldProdId,COUNT(sold.profit) AS totalClients FROM products
                  JOIN sold  ON sold.product_id = products.id
		          JOIN categories ON categories.id = products.category_id
                  WHERE  products.category_id = $cat_id";

        $totalCatClients = $this->db->link->query($query)->fetch();

        return $totalCatClients['totalClients'];
    }


}