<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/17
 * Time: 22:37
 */

namespace app\lib\ioc;

class XPower implements SuperModuleInterface
{
    public $power;

    public $range;

    public function __construct($power, $range)
    {
        $this->power = $power;
        $this->range = $range;
    }

    public function activate()
    {
        // TODO: Implement activate() method.
    }



}