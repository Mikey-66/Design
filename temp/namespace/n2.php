<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/26
 * Time: 10:17
 */

function p(){

    echo __FUNCTION__.'func<hr/>';
}

class C_2
{
    static function p(){
        echo __CLASS__.'<hr/>';
    }
}