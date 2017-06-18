<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/10
 * Time: 17:25
 */

namespace app\lib\sta;



class Yvip extends Vip
{
    public static $level = 2;

    protected $name = "liu jie";

    public function getDiscount()
    {
        return $this->discountRate;
    }

//    public function setLevel($level)
//    {
//        exit('sddk');
//        self::$level = (int)$level;
//    }

    public function getName()
    {
        return $this->name;
    }

}