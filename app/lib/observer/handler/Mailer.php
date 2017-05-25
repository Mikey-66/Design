<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 13:48
 */
namespace app\lib\observer\handler;

use app\lib\observer\Observer;

class Mailer implements Observer
{
    public function handle($context = array())
    {
        echo '<hr/>';
        echo 'send mail';

        dd($context);
    }
}