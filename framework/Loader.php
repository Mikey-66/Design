<?php
/**
 * 自动加载类
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 9:49
 */

namespace framework;

class Loader
{
    // 这里没有使用关键字public 修饰  可以这样写  因为默认就是public
    static function loadfile($className){
        $filePath = ROOT_DIR . DIRECTORY_SEPARATOR . $className . '.php';
        $fixedFilePath = str_replace('\\', '/', $filePath);
        include_once $fixedFilePath;
    }
}