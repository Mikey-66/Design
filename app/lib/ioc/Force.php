<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/17
 * Time: 22:04
 */

namespace app\lib\ioc;

class Force
{
    public $force;

    public function __construct($force)
    {
        $this->force = $force;
    }
}