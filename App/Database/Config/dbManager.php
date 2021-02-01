<?php

namespace  App\Database\Config;

interface dbManager
{

  public function connectDB();

  public function insert($table,$data,$args);

  public function select($table,$where,$val,$by,$option);

  public function update($table, $data, $by, $val, $args);

  public function delete($table, $by, $val);


}
