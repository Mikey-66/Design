<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/17
 * Time: 22:06
 */

namespace app\lib\ioc;

class Shot
{
    public $range;

    public $target;

    public $attack;

    public function __construct($range, $target, $attack)
    {
        $this->range = $range;
        $this->target = $target;
        $this->attack = $attack;
    }
}