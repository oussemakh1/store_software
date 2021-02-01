<?php

namespace  App\Interfaces;

interface ICrud
{

     public function list();

     public function store($data);

     public function edit($id);

     public function update($by,$val,$data);

     public function delete($by,$value);

}
