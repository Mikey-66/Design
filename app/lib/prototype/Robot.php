<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/27
 * Time: 13:32
 */
namespace app\lib\prototype;

class Robot
{
    public $attr = array();
    public function init()
    {
        sleep(3);
        $this->attr = [1,2,3];
    }


}