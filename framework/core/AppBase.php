<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 13:47
 */

namespace framework\core;

use app\lib\config\Config;
use framework\dbconnection\Pdo;

class AppBase
{
    private static $app;

    protected static $tree = array();

    private function __construct($configs = array())
    {
        $configLoader = new Config();
        $dbConfig = $configLoader['global'];
//        dd($dbConfig);exit;
        $dbConfigMaster = $dbConfig['db_master'];
        $dbConfigSlave = $dbConfig['db_slave'][0];

//        $dbConnection = new Pdo();
//        $conn_master = $dbConnection->connect($dbConfigMaster['hostname'], $dbConfigMaster['username'], $dbConfigMaster['passwd'], 'nn_pay');
//        $conn_salve = $dbConnection->connect($dbConfigSlave['hostname'], $dbConfigSlave['username'], $dbConfigSlave['passwd'], 'nn_pay');
//
//        self::set('db_master', $conn_master);
//        self::set('db_slave', $conn_salve);
    }

    public static function instance($configs = array())
    {
        if (empty(self::$app)){
            self::$app = new self($configs);
        }

        return self::$app;
    }

    public function __get($name)
    {
        return isset(self::$tree[$name]) ? self::$tree[$name] : null;
    }

    public static function set($key, $value)
    {
        self::$tree[$key] = $value;
    }

    public static function get($key)
    {
        return isset(self::$tree[$key]) ? self::$tree[$key] : null;
    }


    public static function _unset($key)
    {
        unset(self::$tree[$key]);
    }


    public function run()
    {
        // 以下代码 用于后台注册树模式测试
        $db = \app\lib\factory\Factory::createDatabase();
        \app\lib\register\Register::set('db', $db);

// 没有路由参数时指定默认路由
        if (!isset($_REQUEST['r'])){
            $c = "\\app\\controller\\DefaultController";
            $a = "actionIndex";
        }else{
            $r = explode('/', $_REQUEST['r']);
            $a = 'action' . ucfirst($r[1]);
            $n = "\\app\\controller";
            $c = $n . '\\' . ucfirst($r[0]) . 'Controller';
        }

        $c_instance = new $c;  // 实例化控制器

        if (!method_exists($c_instance, $a)){
            die('method not exist');
        }else{
            call_user_func(array($c_instance, $a));
        }
    }

}