<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 10:24
 */
namespace app\lib\proxy;

// 不是任何的对象都能成为代理，所有代理类应该被规范(即代理会实现某个接口)
interface QueryProxy
{

    public function getOrder($id);

    public function getOrders($ids = array());
}