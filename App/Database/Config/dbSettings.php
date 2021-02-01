<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 1/31/2021
 * Time: 7:07 PM
 */

namespace App\Database\Config;


class dbSettings
{


    public static function set($host,$username,$password,$database)
    {

        return define("HOST",$host) .define("USERNAME",$username) .define("PASSWORD",$password) .define("DATABASE",$database);
    }


}