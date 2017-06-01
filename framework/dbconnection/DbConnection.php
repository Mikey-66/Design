<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 15:03
 */

namespace framework\dbconnection;

interface DbConnection
{

    public function connect($hostname, $username, $passwd, $dbname);

    public function query($sql);

    public function close();

    public function createCommand($sql = null);

}