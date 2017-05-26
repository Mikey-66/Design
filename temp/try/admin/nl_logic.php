<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/26
 * Time: 10:23
 */


class nl_logic
{
    static function logg(){
        echo 'log' . __CLASS__;
    }
}

function log2(){
    echo __NAMESPACE__ . 'sdsd';
}