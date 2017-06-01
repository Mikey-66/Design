<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 16:06
 */
namespace framework\database;

use framework\dbconnection\DbConnection;

class DbCommand implements DbProxy
{
    private $conn;

    public $sql;

    public function __construct(DbConnection $conn, $sql = null)
    {
        $this->conn = $conn;
        $this->sql = $sql;
    }

    public function queryOne()
    {
        $res = $this->conn->query($this->sql);

        dd($res);
        die('ooooook');
    }

    public function queryAll()
    {
        // TODO: Implement queryAll() method.
    }

    public function queryColumn()
    {
        // TODO: Implement queryColumn() method.
    }

    public function queryScalar()
    {
        // TODO: Implement queryScalar() method.
    }

    public function execute()
    {
        // TODO: Implement execute() method.
    }
}