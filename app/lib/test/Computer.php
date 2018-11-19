<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/1/23
 * Time: 10:04
 */
namespace app\lib\test;

abstract class Computer{

    public $hardware;

    public $software;

    /**
     * @var SoftwareManager
     */
    public $softwareManager;

    public function __construct($softwareManager)
    {
        $this->softwareManager = $softwareManager;
    }


    public abstract function start();

    public abstract function shutdown();

}