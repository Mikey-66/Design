<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/26
 * Time: 10:42
 */

namespace framework\database;

class Mysqli implements Database
{

    protected $conn;

    public function connect($hostname, $username, $passwd, $dbname)
    {
        $conn = mysqli_connect($hostname, $username, $passwd, $dbname) or die('cant connect to mysql');

        mysqli_set_charset($conn, 'utf8') or die('fail to set charset');

        return $this->conn = $conn;
        // TODO: Implement connect() method.
    }

    public function query($sql)
    {
        $res = mysqli_query($this->conn, $sql);

        if ($res ===false){
            die("SQL exec fail<br/>" . mysqli_error($this->conn));
        }

        $data = array();

        while ($row = mysqli_fetch_assoc($res)){
            $data[] = $row;
        }

        return $data;
//        return mysqli_query($this->conn, $sql);
        // TODO: Implement query() method.
    }

    public function close()
    {
        mysqli_close($this->conn);
        // TODO: Implement close() method.
    }
}