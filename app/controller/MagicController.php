<?php
/**
 *
 * 常见魔术方法
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 14:55
 */

namespace app\controller;

use app\lib\magic\Magic;

class MagicController extends BaseController
{
    // __set 和 __get 魔术方法
    // 当设置一个不存在的属性时，会调用__set()方法
    // 当访问一个不存在的属性时，会调用__get()方法
    public function actionT1(){
        $obj = new Magic();
        $obj->name = "sd";
        $obj->age = 20;
        dd($obj->name);
        dd($obj);
    }

    // __call()  和 __callStatic()
    // 当访问类中非静态方法时不存在时会调用 __call()
    // 当访问类中的静态方法不存在时会调用__callStatic()
    public function actionT2(){
        $obj = new Magic();
        $obj->fly(60, 'chengdu');

        Magic::jump(array('liu', 22));
    }

    // __toString()
    public function actionT3(){
        $obj = new Magic();
        echo $obj;
    }

    // __invoke()
    public function actionT4(){
        $obj = new Magic();
        $obj();
    }
}
