<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/31
 * Time: 13:12
 */
namespace app\lib\decorator;

use app\lib\decorator\Decorator;

class Color implements Decorator
{

    public $color;

    public function __construct($str = 'black')
    {
        $this->color = $str;
    }

    public function before()
    {
        // TODO: Implement before() method.
        echo "<Div style='color:{$this->color};'>";
    }

    public function after()
    {
        // TODO: Implement after() method.
        echo '</Div>';
    }
}