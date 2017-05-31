<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/31
 * Time: 13:05
 */
namespace app\lib\decorator;

interface Decorator
{
    public function before();

    public function after();
}