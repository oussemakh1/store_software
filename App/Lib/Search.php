<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 2/2/2021
 * Time: 9:46 AM
 */

namespace App\Libs;


class Search
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function Search($table,$by,$val)
    {
        $searched_data = $this->db->search($table,$by,$val);
        if($searched_data) {
            return $searched_data;
        } else {
            return false;
        }
    }

}