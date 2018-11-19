<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/1/19
 * Time: 16:36
 */
namespace app\lib\magic;


class StringTool{

    private $inString;

    private $outString;

    public function __construct($string)
    {
        $this->inString = $string;
        $this->outString = $string;
    }

    public function setString($string){
        $this->inString = $string;
        $this->outString = $string;
    }

    public function getRes(){
        return $this->outString;
    }

    public function __call($func, $arguments)
    {
        array_unshift($arguments, $this->outString);
        $this->outString = call_user_func_array($func, $arguments);
        return $this;
    }

}