<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/5/11
 * Time: 16:33
 */
namespace framework\database;

class fk_db_conn_manager
{
    const FK_DB_WRITE = 1;

    const FK_DB_READ  = 2;

    public static $conn_arr = array();

    public static function get_conn_by_type($type)
    {
        if ($type == self::FK_DB_READ)
        {

        }
        elseif ($type == self::FK_DB_WRITE)
        {

        }
        else
        {
            return false;
        }

    }

}