<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 14:33
 */
namespace framework\database;

interface DbProxy
{
    public function queryOne();

    public function queryAll();

    public function queryColumn();

    public function queryScalar();

    public function execute();
}