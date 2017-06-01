<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 15:09
 */

namespace framework\dbconnection;

use framework\database\DbCommand;
use framework\dbconnection\DbConnection;

class Pdo implements DbConnection
{

    public $className = __CLASS__;

    protected $conn;

    public function connect($hostname, $username, $passwd, $dbname)
    {
        $dsn = "mysql:hostname={$hostname};dbname={$dbname}";

        $pdo = new \PDO($dsn, $username, $passwd);

        $pdo->exec("SET NAMES 'utf8'");

        $this->conn = $pdo;

        return $this;
    }

    public function query($sql)
    {
        $res = $this->conn->query($sql);

        if ($res === false){
            $errorInfo = $this->conn->errorInfo();
            die("SQL exec fail<br/>" . $errorInfo[2]);
        }

        return $res;
    }

    public function createCommand($sql = null)
    {
        return new DbCommand($this, $sql);
    }

    public function close()
    {
        unset($this->conn);
    }
}