<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/24
 * Time: 14:31
 */
namespace app\controller;

use autoloader\Dog;
use autoloader\animal\Cat;

class TestController extends BaseController
{
    public function actionIndex()
    {
        $params = $_GET;
        $dog = new Dog();
        $cat = new Cat();

        dd($params);
        dd($dog);
    }


    /**
     * PHP 中 null 值 可以这样和别的变量值进行比较 ， mysql中不行
     */
    public function actionT1(){
        $x = 0;
        if ($x === null){
            echo 'null';
        }else{
            echo 'not null';
        }
    }

    /**
     * PHP 5.5 以下， empty() 不能使用函数的返回值为传入值
     */
    public function actionT2(){
        $dog = new Dog();
        if (empty($dog->name)){
            echo 'empty';
        }else{
            echo 'not empty';
        }
    }

    /**
     * PHP 获取配置文件参数 内置函数
     */
    public function actionT3()
    {
        $ini = parse_ini_file(CONFIG_DIR . '/' . 'global_manager_log.ini', true);
        dd($ini);
    }







}
