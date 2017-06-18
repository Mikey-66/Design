<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/17
 * Time: 21:18
 */

namespace app\lib\ioc;

class Fly
{
    public $holdtime;

    public $speed;

    public function __construct($speed, $holdtime)
    {
        $this->holdtime = $holdtime;
        $this->speed = $speed;
    }
}