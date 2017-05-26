<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/26
 * Time: 10:43
 */

namespace framework\database;

interface Database
{
    // 注意 接口中不允许存在成员变量
//    private $conn;

    public function connect($hostname, $username, $passwd, $dbname);

    public function query($sql);

    public function close();
}