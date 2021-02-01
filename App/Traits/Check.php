<?php

namespace  App\traits;

use App\Database\MysqlDB;

trait Check
{
    private $db;

  public function __construct()
  {
      $this->db = new MysqlDB();
  }

    public function CheckIfExist ($col,$val,$table)
  {
    // query
    $query = "SELECT '$col' FROM $table WHERE $col = '$val' ";

    // execute
    $Check = $this->db->link->query($query);

    if($Check->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

}
