<?php
/**
 * Created by PhpStorm.
 * User: Oussema
 * Date: 2/6/2021
 * Time: 1:55 PM
 */

namespace App\traits;

trait Crud
{

    public function list_data($table,$by,$order,$db)
    {
        $data = $db->select($table,"none","none",$by,$order);

        if($data) {
            return $data;
        } else {
            return false;
        }
    }


    public function store_data($table,$col,$col_value,$args,$data,$db)
    {

        if($col == 'none')
        {
            $Exist = false;
        }else {
            $Exist = $this->CheckIfExist($col, $col_value, $table);
        }
        if($Exist == false) {
            $insert = $db->insert($table,$data,$args);
            if($insert) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }

    }

    public function edit_data($table,$col,$value,$by,$order,$db)
    {
        $data = $db->select($table,$col, $value, $by, $order);

        if($data) {
            return $data;
        } else {
            return false;
        }
    }

    public function update_data($table,$by,$val,$data,$args,$db)
    {

        $Check = $this->CheckIfExist($by,$val,$table);

        if($Check == true) {

            // update
            $update = $db->update($table,$data,$by,$val,$args);

            if($update) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }


    public function delete_data($table,$by,$value,$db)
    {
        $delete = $db->soft_delete($table, $by, $value);

        if($delete) {
            return true;
        } else {
            return false;
        }

    }
}