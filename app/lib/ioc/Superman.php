<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/17
 * Time: 21:15
 */

namespace app\lib\ioc;

class Superman
{
//    public $power;

//    public $power2;

//    public $power3;

    public $module;

//    public function __construct(array $modules)
//    {
//        $this->power = new Fly(200, 8);

        // 使用工厂模式改写
//        $this->power = array(
//            new Fly(200,20),
//            new Shot(100,5,1000),
//            new Force(200)
//        );

//        $this->power = SuperModuleFactory::makeModule('Fly', [200, 8]);

        // 继续改造
//        $this->power = array(
//            SuperModuleFactory::makeModule('Fly', [200, 8]),
//            SuperModuleFactory::makeModule('Shot', [200, 5, 999])
//        );

//        foreach ($modules as $moduleName => $moduleOptions) {
//            $this->power[$moduleName] = SuperModuleFactory::makeModule($moduleName, $moduleOptions);
//        }
//
//    }

    // 依赖注入： 只要不是由内部生产（比如初始化，构造函数中通过工厂方法、自行手动new的），而是由外部以参数形式注入的，都属于依赖注入(DI)
    public function __construct(SuperModuleInterface $module)
    {
        $this->module = $module;
    }


}