<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/27
 * Time: 18:05
 */

namespace app\controller;

class Foo
{
    static function say(){
        dd('say hello');
    }

    static function speak(callable $func){
     //   $func(); // 和下面一样可以执行该函数，但是如果传过来的不是一个闭包而是一个字符串会出错
        call_user_func($func);
    }
}



class GrammerController extends BaseController
{

    // 类型提示
    public function actionT1(){

        $func = function (){
            echo 'liujie';
        };

        dd($func);

        Foo::speak($func);

        Foo::speak("app\controller\Foo::say");
    }

}