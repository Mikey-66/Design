<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/10
 * Time: 17:10
 */

namespace app\lib\sta;

abstract class Vip
{
    const SEX_MALE = 1;
    const SEX_FEMALE = 2;


    protected static $level;  // vip 会员等级 (1-9)

    public static $age = 18;

    public $score = 0;   // 积分

    protected $discountRate = 1;

    public static $sex = self::SEX_MALE;

    function calcDiscount()
    {
        return ( $this->discountRate * (10 - static::$level) ) / 10;
    }

    public function setLevel($level)
    {
        static::$level = (int) $level;
    }

    public static function getLevel()
    {
        return static::$level;
    }

    public static function getSex()
    {
        return self::$sex;
    }
}

