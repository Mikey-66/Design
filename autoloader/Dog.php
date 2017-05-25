<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 12:46
 */
namespace autoloader;

class Dog{

    public $name;

    public function __construct()
    {
        $this->age = 19;
    }

    public function wang(){

    }

//    public function __destruct()
//    {
//        // TODO: Implement __destruct() method.
//        echo '<br/>bye';
//    }
}