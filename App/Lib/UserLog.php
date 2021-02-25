<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 2/6/2021
 * Time: 1:29 PM
 */

namespace App\Libs;


class UserLog
{
    private $page;
    private $user_id;
    private $action;
    private $action_date;


    public function __construct($db)
    {
        $this->db = $db;
    }

    public function InsertLog ($data)
    {
        extract($data);

        $query = "INSERT INTO users_logs SET page = $page, user_id = $user_id, action = $action, action_date = $action_date ";
        $user_log = $this->db->link->query($query);

        if($user_log) {
            return $user_log;
        } else {
            return false;
        }
    }


    public function user_log($user_id)
    {
        $query = "SELECT * FROM users_logs WHERE user_id = $user_id ORDER BY id DESC";
        $getUserLogs = $this->db->link->query($query);

        if($getUserLogs) {
            return $getUserLogs;
        } else {
            return false;
        }
    }
}