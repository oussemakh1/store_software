<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 2/5/2021
 * Time: 3:08 PM
 */

namespace App\traits;


trait Invoice
{

  /* public function Invoice ($db, $client_id, $order_id, $type)
   {
       $this->db = $db;

       // get order data
       $query = "SELECT * FROM orders WHERE id = $order_id AND client_id = $client_id ";
       $getOrder = $this->db->link->query($query)->fetch();

       // extract products id && products quantites
       $products_id = $getOrder['products'];
       $products_quantites = $getOrder['quantites'];

       // get products names
       $query = "SELECT name,price FROM products WHERE id IN ($products_id) ";

       $getProducts = $this->db->link->query($query)->fetchAll();


       // link product names & prices with with product quantites
       $order = array();
       $quantites = array_map(trim,explode(",",$products_quantites));

       foreach($getProducts as $product)
       {
           $order_data = array (
                "name" => $product['name'],
                "price" => $product['price']
           );


           for($i=0;$i<=count($quantites);$i++)
           {
               $quantity = array (

                   "quantity" => $quantites[$i],

               );

               array_push($order_data,$quantity);
           }

           array_push($order_data, $order);
       }


       // Total & Vat & Discount Data
       $Money_data = array (
         "discount" => $getOrder['discount'],
           "vat" => $getOrder['vat'],
           "total" => $getOrder['total']
       );

       // Client Data
       $Client_data = $this->db->link->query("SELECT * FROM $type WHERE id = $client_id");

       // Invoice Data
       $Invoice_data = array ();

       // Insert All Concerned Arrays
       array_push($Invoice_data,$order);
       array_push($Invoice_data, $Money_data);
       array_push($Invoice_data, $Client_data);


       return $Invoice_data;

   } */

  public function invoice($invoice_type,$order_id,$db)
  {

      if($invoice_type == 'buy') {
          $client_type = 'provider';
          $client_table = 'providers';
      } else {
          $client_type = 'client';
          $client_table = 'clients';
      }

      // fetch by product
      $query = "SELECT * FROM $invoice_type WHERE order_id = $order_id";
      $byProduct = $db->link->query($query)->fetchAll();

      // fetch order data
      $query = "SELECT * FROM orders WHERE id = $order_id";
      $orderData = $this->db->link->query($query)->fetch();

      // fetch client data
      $client_id = $orderData['client_id'];
      $query = "SELECT * FROM $client_table WHERE id = $client_id";
      $client_data = $db->link->query($query)->fetch();

      $invoice_info = array(
          "client_type" => $client_type
      );

      $invoice_info['client_info'][] = $client_data;
      $invoice_info['items'][] = $byProduct;
      $invoice_info['order_data'][] = $orderData;

      return $invoice_info;
  }

}