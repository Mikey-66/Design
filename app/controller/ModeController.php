<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 10:16
 */
namespace app\controller;
use app\lib\singleton\Query;
use app\lib\factory\Factory;
use framework\Database;
use app\lib\register\Register;

class ModeController extends BaseController
{
    // 链式模式
    public function actionT1(){
        $query = new Query();
        $data = $query->select()->from()->where()->limit()->order()->query();
    }

    // 工厂模式
    public function actionT2(){
        // 通过工厂获取对象，而非直接new一个,这样做的好处是，一旦对象发生变化，比如类名改变，
        // 可以在工厂中对对象进行维护，而不用到处（所有直接new的地方）修改类名

        $db = Factory::createDatabase();

        dd($db);
    }

    // 单例模式
    public function actionT3(){
        // 一个类只允许实例化一次，以节省资源
        // 这些对象都是同一个对象
        $db1 = Database::getInstance();
        $db2 = Database::getInstance();
        $db3 = Database::getInstance();
        $db4 = Database::getInstance();
    }

    // 注册树模式
    public function actionT4(){
        // 原理是 app初始化时 将需要的对象工厂方法拿到后，将其保存在一个全局可以访问的数组中，
        // 当再次需要用到这个对象时，直接从树中取，而不是通过工场去拿

        $db = Register::get('db');

        if (empty($db)){    // 通过树没有取到db实例， 再通过工场去拿
            $db = Factory::createDatabase();
        }
    }


}