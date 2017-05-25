<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 10:28
 */
namespace app\lib\factory;
use framework\Database;

class Factory
{
    static function createDatabase(){

        //return new Database();  // 结合单例模式之前的写法

        return Database::getInstance();
    }
}