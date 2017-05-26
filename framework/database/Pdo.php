<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/26
 * Time: 10:42
 */

namespace framework\database;

class Pdo implements Database
{
    protected $conn;

    public function connect($hostname, $username, $passwd, $dbname)
    {
        // TODO: Implement connect() method.
        $dsn = "mysql:hostname={$hostname};dbname={$dbname}";

//        echo $dsn;exit;

        $pdo = new \PDO($dsn, $username, $passwd);

        $pdo->exec("SET NAMES 'utf8'");

        return $this->conn = $pdo;
    }

    public function query($sql)
    {
        $res = $this->conn->query($sql);

        if ($res === false){
            $errorInfo = $this->conn->errorInfo();
            die("SQL exec fail<br/>" . $errorInfo[2]);
        }

        $data = [];
        while($row = $res->fetch(\PDO::FETCH_ASSOC)){
            $data[] = $row;
        }

        return $data;
        // TODO: Implement query() method.
    }

    public function close()
    {
        // TODO: Implement close() method.
        unset($this->conn);
    }
}