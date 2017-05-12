<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 10:20
 */
namespace observer\event;

class OrderPaidEvent extends EventGenerator{

    public function __construct($context = array())
    {
        $this->context = $context;
    }

    public function trigger(){
        $this->notify();
    }
}