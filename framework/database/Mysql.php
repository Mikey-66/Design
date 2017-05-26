<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/26
 * Time: 10:42
 */

namespace framework\database;

class Mysql implements Database{

    protected $conn;

    public function connect($hostname, $username, $passwd, $dbname)
    {

        // TODO: Implement connect() method.
        $conn = @mysql_connect($hostname, $username, $passwd) or die('cant connect to mysql');

        @mysql_selectdb($dbname, $conn) or die('cant select db:' . $dbname);

        mysql_set_charset('utf8', $conn) or die('fail to set charset');

        return  $this->conn = $conn;

    }

    public function query($sql)
    {
        // TODO: Implement query() method.
        $res = mysql_query($sql, $this->conn);

        if ($res ===false){
            die("SQL exec fail<br/>" . mysql_error($this->conn));
        }

        $data = [];

        while($row = mysql_fetch_assoc($res)){
            $data[] = $row;
        }

        return $data;
    }

    public function close()
    {
        // TODO: Implement close() method.

        mysql_close($this->conn);
    }
}