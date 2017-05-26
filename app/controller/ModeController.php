<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 10:16
 */
namespace app\controller;
use app\lib\observer\event\OrderPaidEvent;
use app\lib\observer\handler\Logger;
use app\lib\observer\handler\Mailer;
use app\lib\singleton\Query;
use app\lib\factory\Factory;
use app\lib\strategy\ManStrategy;
use app\lib\strategy\WomanStrategy;
use framework\Database;
use app\lib\register\Register;
use framework\database\Mysql;
use framework\database\Mysqli;
use framework\database\Pdo;


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

    //观察者模式
    public function actionT5(){
        $event = new OrderPaidEvent();
        $p = array(
            'name' => 'liujie',
            'age' =>20
        );

        // 这里可以添加很多个观察者，实现不同的业务逻辑，这样做的好处是可以解耦代码，
        // 让我们的代码具有很强的可延展性

        $event->addObserver(new Logger());
        $event->addObserver(new Mailer());

        // 设置时间环境
        $event->setContext($p);

        $event->notify();

    }

    // 适配器模式
    /*
     * 实现关键
     * 【自定义类Mysql，Mysqli，Pdo 实现一个统一接口类】
     */
    public function actionT6(){
        //统一化接口

        $db = new Mysql();
//        $db = new Mysqli();
//        $db = new Pdo();
        $db->connect('localhost', 'root', '111111', 'nn_pay');

        $res = $db->query('select nns_id, nns_name from nns_pay_order limit 0,2');

        $db->close();

        dd($res);
        exit;
    }

    // 策略模式 【非常重要】

    public function actionT7(){

        if ($_GET['sex'] =='m'){
            $stragety = new ManStrategy();
        }else{
            $stragety = new WomanStrategy();
        }

        $stragety->showAd();
        $stragety->showCate();
    }




}