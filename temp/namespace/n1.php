<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/26
 * Time: 10:07
 */
namespace n1;
function nl_say(){
    echo __FUNCTION__ . '<hr/>';
}

class C_1{
    static function p(){
        echo __CLASS__ . '<hr/>';
    }
}