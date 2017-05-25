<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 11:47
 */
namespace app\lib\observer\handler;

use app\lib\observer\Observer;

class Logger implements Observer
{
    public function handle($context = array())
    {
        echo 'order paied';
        dd($context);
    }
}
