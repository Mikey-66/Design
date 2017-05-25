<?php
/**
 *  use 用法
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 17:36
 */


/**
 *1】用于命名空间    （个人认为这种用法意义不大）
 *2】用于向匿名函数传递外层参数
 *
 */

namespace app\controller;

use app\lib\obj as animal;


class UseController extends BaseController
{
    public function actionT1(){
        $dog = new animal\Dog();
    }


    public function actionT2(){

        $a = '1';
        $b = '2';
        $func = function($name) use ($a, $b)
        {
            return $name . $a . $b;
        };

        dd($func);
        echo call_user_func($func, 'liujiep');
//        echo $func('liujie');


    }
}