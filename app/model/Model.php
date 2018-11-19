<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/2/2
 * Time: 16:22
 */
namespace app\model;

abstract class Model
{
    public static $table_name;

    public static $pk;

    protected static function findByPk($id, $field= "*")
    {
        if (is_array($field)){
            $field = implode(',', $field);
        }

        $table_name = static::$table_name;
        $pk = static::$pk;

        $sql= "select {$field} from $table_name where {$pk} = {$id}";
        return $sql;
    }

    public function findByWhere(){

    }

    public function findAll(){

    }

    public function findOne(){

    }

    public function findBySql(){

    }
}

