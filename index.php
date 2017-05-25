<?php
/**
 * 自定义框架入口脚本
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/24
 * Time: 14:26
 */

/*
 *          【PSR-0 标准】
 * 1】命名空间和文件绝对路径一致
 * 2】类名的首字母大写
 * 3】除了入口文件，其他文件里只能有一个类，不能有其他可执行代码
 */

define('ROOT_DIR', dirname(__FILE__));  // 根目录 Design

include_once "includer.php";

include_once "framework/Loader.php";

spl_autoload_register('\\framework\\Loader::loadfile');

// 在这里可以初始化一些全局都有用的对象（组件），例如数据库连接，日志，请求

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

$c_instance = new $c;

if (!method_exists($c_instance, $a)){
    die('method not exist');
}else{
    call_user_func(array($c_instance, $a));
}

