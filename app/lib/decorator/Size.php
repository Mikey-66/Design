<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/31
 * Time: 13:14
 */
namespace app\lib\decorator;

use app\lib\decorator\Decorator;

class Size implements Decorator
{

    public $size;

    public function __construct($size = 16)
    {
        $this->size = $size;
    }

    public function before()
    {
        // TODO: Implement before() method.
        echo "<Div style='font-size:{$this->size}px;'>";
    }

    public function after()
    {
        // TODO: Implement after() method.
        echo '<Div/>';
    }
}