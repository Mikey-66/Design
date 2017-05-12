<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 14:23
 */
namespace observer\handler;

class Mailer implements Observer{

    public function handle($context = array())
    {
        var_dump($context);
        echo "发送邮件通知用户付款成功<hr/>";
    }
}