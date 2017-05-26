<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/26
 * Time: 10:15
 */
namespace admin;

//exit('ok');
include_once "nl_logic.php";
//exit('ok');

class nl_log
{
    static function p(){
        log2();  // 函数这里前面的\线可以不写，但是类就不行了
        \nl_logic::logg();
    }
}