<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/18
 * Time: 14:17
 */

namespace framework\request;

class Request
{
    // 处理请求
    public function dispose()
    {
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