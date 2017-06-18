<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/10
 * Time: 19:45
 */
namespace app\lib\sta;


abstract class DbHandler
{

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (static::$ins){
            return static::$ins;
        } else {
            return static::$ins = new static();
//            return self::$db = new self();
        }

    }

    public static function getClassName()
    {
        return static::getName();
    }

    protected static function getName()
    {
        return __CLASS__;
    }

    abstract public function link();

    abstract public function close();

    abstract public function query();
}