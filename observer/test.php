<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 10:18
 */
include_once dirname(dirname(__FILE__)) . '/autoload.php';  // 后续迁移到入口脚本

use observer\event\OrderPaidEvent;
use observer\handler\Logger;
use observer\handler\Authorizer;
use observer\handler\Mailer;

//$path = get_include_th();
//
//echo $path;exit;
/**
 * 观察者模式 实际运用模拟
 * 场景 订单支付成功后 需进行一系列后续业务处理，采用观察者模式 实现低耦合/高扩展性代码
 */

/*
 *
 *  订单支付成功
 */

// echo 'order paied<br/>';
$params = array(
    'a' => 1,
    'b' => 2,
    'c' => 3
);
header('content-type:text/html; charset=utf-8;');
$orderEvent = new OrderPaidEvent();

$orderEvent->setContext($params);

// 日志逻辑处理
$orderEvent->addObserver(new Logger($params));

// 更改授权逻辑
$orderEvent->addObserver(new Authorizer($params));

// 邮件通知
$orderEvent->addObserver(new Mailer($params));

// 更多的逻辑...

$orderEvent->trigger();
