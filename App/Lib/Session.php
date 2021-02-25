<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 2/7/2021
 * Time: 3:56 PM
 */

namespace App\Libs;


class Session
{
    private static $_sessionStarted = false;

    public function start()
    {
        if(self::$_sessionStarted == false)
        {
            session_start();
            self::$_sessionStarted = true;
        }
    }

    public static function set($key, $value)
    {
        $_SESSION[$key]= $value;
    }

    public static function get($key, $secondKey= false)
    {
        if($secondKey == true)
        {
            if (isset($_SESSION[$key][$secondKey]))
                return $_SESSION[$key][$secondKey];
        }
        else
        {
            if(isset($_SESSION[$key]))
                return $_SESSION[$key];
        }

        return false;
    }

    public static function destory()
    {
        session_unset();
        session_destroy();
        self::$_sessionStarted = false;
    }

}