<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/17
 * Time: 21:13
 */

namespace app\controller;

use app\lib\ioc\Container;
use app\lib\ioc\Fly;
use app\lib\ioc\Lap;
use app\lib\ioc\Shot;
use app\lib\ioc\Superman;
use app\lib\ioc\UltraBomb;
use app\lib\ioc\XPower;
use framework\configure\Config;
use framework\core\Lua;
use framework\response\Response;

class IocController extends BaseController
{


    public function actionT1()
    {
//        $superMan = new Superman([
//            'Shot' => [100, 5, 999],
//            'Fly' => [200, 8]
//        ]);

        $superModule = new XPower();

        $superMan = new Superman($superModule);

        dd($superMan);
    }

    // 使用ioc容器 先注册生产类的脚本（bind），再执行生产命令（make）
    public function actionT2()
    {
        $container = new Container();
        $container->bind('Superman', function($container, $options){
            $className = current($options);
            unset($options['className']);
            $op[] = $options;
            $x = $container->make($className, $op);
            return new Superman($x);
        });

        $container->bind('XPower', function ($container, $options){
//            dd($options);
//            exit;
            return new XPower($options['power'], $options['range']);
        });

        $container->bind('UltraBomb', function ($container, $options) {
//            dd($options);exit;
            return new UltraBomb($options);
        });

        $superman = $container->make('Superman', [['className' => 'XPower', 'power' => 99, 'range' => 100]]);
        $superman2 = $container->make('Superman', [['className' => 'UltraBomb', 'range' => 100, 'p' => ['sd', 'oop']]]);

        dd($superman);
        dd($superman2);

//        dd($container);
    }


    // 将ioc容器 运用到框架中
    public function actionT3()
    {
        $lapContainer = new Container();

        # 注册需要使用的脚本
        // $lapContainer->bind();
        // $lapContainer->bind();
        // $lapContainer->bind();
        // $lapContainer->bind();

        # 生产服务容器对象及相关依赖
        // $lap = $lapContainer->make();

        # 起飞 ！
        //$lap->run();
    }


    public function actionT4()
    {
        $config = new Config('global');

        $lap = new Lap($config);
        dd($lap);
    }

    public function actionT5()
    {
//        $res = Lua::app()->db->query('select nns_id, nns_channel_id, nns_channel_name from nns_pay_config');
//        $data = $res->fetchAll(\PDO::FETCH_ASSOC);
//
//        dd($data);

        // 直接向容器绑定实例
//        $response = new Response();
//        Lua::app()->container->bind('response', $response);

        // 绑定生产实例的脚本
//        $func = function ($container) {
//            return new \framework\response\Response();
//        };
//        Lua::app()->container->bind('response', $func);

        // 使用Lap类中 动态注册组件加载对象到app实例上
//        $response = new Response();
//        Lua::app()->registerComponent('response', $response);
//        Lua::app()->loadComponent('response');

        $func = function ($container) {
            return new \framework\response\Response();
        };
        Lua::app()->registerComponent('response', $func);
        Lua::app()->loadComponent('response');

        return Lua::app()->response->json(['code' => 200, 'msg' => '努力学习面向对象编程中！']);

//        dd(Lua::app()->container);
//        dd($r);
//        dd(Lua::app());
    }


}