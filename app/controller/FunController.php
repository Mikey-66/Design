<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/24
 * Time: 16:41
 */
namespace app\controller;

class FunController extends BaseController
{
    public function actionFun1(){

        ignore_user_abort();//即使Client断开(如关掉浏览器)，PHP脚本也可以继续执行.
        set_time_limit(0); // 执行时间为无限制，php默认的执行时间是30秒，通过set_time_limit(0)可以让程序

    }
}
