<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/31
 * Time: 13:35
 */

namespace app\lib\decorator;

class MyFoo
{
    public $ins; // (instance)

    public function __construct(Foo $ins)
    {
        $this->ins = $ins;
    }

    public function cost()
    {
        return 0.5 * $this->ins->cost();
    }
}