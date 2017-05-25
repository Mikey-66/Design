<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 10:55
 */
namespace app\lib\register;


class Register
{
    protected static $tree = array();

    static function get($key){
        if (isset(self::$tree[$key])){
            return self::$tree[$key];
        }

        return null;
    }

    static function set($key, $obj){
        self::$tree[$key] = $obj;
    }

    static function _unset($key){
        unset(self::$tree[$key]);
    }

}