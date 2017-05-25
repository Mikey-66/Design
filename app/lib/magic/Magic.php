<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 15:03
 */
namespace app\lib\magic;

class Magic
{

    public $name = 'liujie2';
    public $age = 202;
    private $arr = array();

    public function __set($name, $value)
    {
        $this->arr[$name] = $value;
    }

    public function __get($name)
    {
        return isset($this->arr[$name]) ? $this->arr[$name] : null;
    }

    public function __call($name, $arguments)
    {
        dd($name);
        dd($arguments);
    }

    public static function __callStatic($name, $arguments){
        dd($name);
        dd($arguments);
    }

    public function __toString()
    {
        return __CLASS__;
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        echo __FUNCTION__;
    }


}