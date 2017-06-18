<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/13
 * Time: 19:49
 */

namespace app\lib\symfunc;


class A
{
    public static function test()
    {
        return get_called_class();
    }

    public static function showClass()
    {
        return __CLASS__;
    }

    public static function callTest()
    {
        return self::test();
    }

    public static function callShowClass()
    {
//        return self::showClass();
        return static::showClass();
    }

    public function Test2()
    {
        $data = db::connection('pay')->query('select * from nns_pay_order');
        $res = db::connection('pay')->exec('insert nns_user(name, id, age) values("sd", 3, 21)');

        $data = db::connection('aaa')->table('nns_user')->all();
    }
}