<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/1/23
 * Time: 10:19
 */

namespace app\lib\test;

class Warcraft3 implements Software{

    public function install()
    {
        echo __FUNCTION__ ." ". __CLASS__;
    }

    public function restore()
    {
        echo __FUNCTION__ ." ". __CLASS__;
    }

    public function uninstall()
    {
        echo __FUNCTION__ ." ". __CLASS__;
    }
}