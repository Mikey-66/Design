<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 13:57
 */

/***
 * 自动加载类
 */

define('APP_ROOT', dirname(__FILE__));

//echo APP_ROOT;exit;

function my_loader($className){
    // echo APP_ROOT . '/' . $className . '.php';exit;
    // C:\WWW\Design/autoloader\Dog.php linux 上无法找到文件 需要对'\'做处理
    include_once APP_ROOT . DIRECTORY_SEPARATOR . $className . '.php';
}

spl_autoload_register('my_loader');