<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 11:02
 */

// 演示配置读取

namespace app\controller;

use app\lib\config\Config;

class ConfigController extends BaseController
{

    public function actionT1()
    {
        $configObj = new Config();
        $db_fonfig = $configObj['db'];
        $cache_config = $configObj['cache'];

        dd($db_fonfig);

    }
}