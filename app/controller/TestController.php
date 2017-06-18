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
use framework\core\App;
use framework\SqlBuilder;

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


    public function actionT4()
    {
//        $app = App::instance();
//        dd($app);
//        $db_master = App::get('db_master');
//        dd($db_master);
        $sqlBuilder = SqlBuilder::Query();
//        dd($sqlBuilder);exit;
        $sqlBuilder ->from('nns_user u')
                    ->leftJoin('nns_device d', 'u.nns_id = d.nns_user_id')
                    ->leftJoin('nns_user_extends ue', 'u.nns_id = ue.nns_user_id')
//                    ->select('u.nns_name, u.nns_password, d.nns_id')
//                    ->where("u.nns_name = '13002555713'")
//                    ->where("u.nns_login_time is not null", 'or')
//                    ->orWhere("u.nns_age > 18")
//                      ->andWhere("u.nns_sex = 'male' AND ( u.nns_age > 18 AND u.nns_state = 1 )");
//                    ->where("u.nns_name = '13001808043'")
//                    ->offset(12)
                    ->limit(1)
                    ->orderBy('u.nns_id DESC');


        dd($sqlBuilder);
        dd($sqlBuilder->getSql());
        exit;
    }


    // 加密、解密
    public function actionT5()
    {
        $str = '880229sd';
        $str_encode = email_encode($str);

        dd($str_encode);

        $str_decode = email_decode($str_encode, 'starcor');

        dd($str_decode);

        var_dump($str_decode);

        // 单向哈希函数   将任意长度输入转化为固定长度的输出，常见的函数有md5，sha1

        echo '<hr/>';
        echo 'md5 hash:';
        dd(md5('sdasdjasjdaskdjjasd'));

        echo '<hr/>';
        echo 'sha1 hash:';
        dd(sha1('sdasdjasjdaskdjjasd'));

    }

    public function actionT6()
    {
        $range = range(1,20);
        dd($range);

        shuffle($range);

        dd($range);
    }




}
