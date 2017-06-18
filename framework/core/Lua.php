<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/18
 * Time: 14:48
 */

namespace framework\core;

final class Lua
{

    private static $app;

    public static function app()
    {
        return self::$app;
    }

    public static function register($app)
    {
        if ($app instanceof Lap){
            self::$app = $app;
        }
    }
}