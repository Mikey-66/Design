<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/5/10
 * Time: 10:30
 * 可用于项目
 */

namespace framework\database;

class fk_db_mysqli
{
    /**
     * @var \mysqli
     */
    private $mysqli = false;

    private $query_res = false;

    public function __construct()
    {
        $this->connect();
    }

    public function __destruct()
    {
        $this->close();
    }

    public function check_is_connected()
    {
        if (!$this->mysqli)
        {
            return false;
        }

        return true;
    }

    public function connect()
    {
        $this->close();

        $mysqli = @new \mysqli('127.0.0.1', 'root', '111111', 'dev');

        if ($mysqli->connect_errno)
        {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

        $mysqli->query("SET NAMES utf8");

        $this->mysqli = $mysqli;
    }

    public function query($sql)
    {
        $this->free_result();

        $this->query_res = $this->mysqli->query($sql);

        if ($this->query_res === false)
        {
            return false;
        }

        return true;
    }

    public function exec($sql)
    {
        $this->free_result();

        $this->query_res = $this->mysqli->query($sql);

        if ($this->query_res === false)
        {
            return false;
        }

        return true;
    }

    public function get_query_result($free_result = true)
    {
        if ($this->query_res === false)
        {
            return false;
        }

        if ($this->query_res instanceof \mysqli_result)
        {
            $data = array();
            while ($row = $this->query_res->fetch_assoc())
            {
                $data[] = $row;
            }

            if ($free_result)
            {
                $this->free_result();
            }

            return $data;
        }

        return true;
    }

    private function close()
    {
        $this->free_result();

        if ($this->mysqli instanceof \mysqli)
        {
            $this->mysqli->close();
        }

        $this->mysqli = false;

        return true;
    }

    public function free_result()
    {
        if ($this->query_res instanceof \mysqli_result)
        {
            $this->query_res->free_result();
        }

        $this->query_res = false;
    }
}