<?php

namespace  App\traits;


trait Data
{

    public function secure_data($data)
    {

        foreach($data as $key => $val) {

          $data[$key] = htmlspecialchars(strip_tags($val));

        }

        return $data;
    }


}
