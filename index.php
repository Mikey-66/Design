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

// 读取配置 生成应用实例------------>
// (在这里可以初始化一些全局都有用的对象（组件），例如数据库连接，日志，请求，注册到实例树上)
// 初始化系统组件
// 根据配置觉得实例化应用组件

$configs = array(
    'db' => [
        'class' => '',
    ],
);

$app = \framework\core\App::instance($configs)->run();


