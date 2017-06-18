<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/18
 * Time: 14:45
 */
namespace framework\core;

use framework\dbconnection\Pdo;
use framework\request\Request;

class Lap
{
    private $component;  // 组件

    protected $container;   // 容器

    protected $config;

    public function __construct($config)
    {
        $this->container = new Container();
        $this->config = $config;
        $this->registerBaseComponent();
        $this->loadBaseComponent();
    }

    private function registerBaseComponent()
    {
        // 注册数据库链接组件
//        $this->container->bind('db', function($container){
//            if (!isset($this->config['db'])){
//                exit('do not find db config');
//            }
//            $dbConfig = $this->config['db'];
//
//            $pdo = new Pdo();
//            return $pdo->connect($dbConfig['hostname'], $dbConfig['username'], $dbConfig['passwd'], $dbConfig['dbname']);
//        });

        $this->container->bind('request', function($container){
            return new Request();
        });
    }

    private function loadBaseComponent()
    {
        $binds = $this->container->getBinds();
        if (count($binds)){
            foreach ($binds as $moduleName => $baseComponent) {
                $this->component[$moduleName] = $this->container->make($moduleName);
            }
        }
//        $this->component['db'] = $this->container->make('db');
    }

    public function registerComponent($abstract, $concrete)
    {
        $this->container->bind($abstract, $concrete);
    }

    public function loadComponent($moduleName)
    {
        if (!isset($this->component[$moduleName])){
            $module = $this->container->make($moduleName);
            $this->component[$moduleName] = $module;
        }
    }


    public function __get($name)
    {
        if (strtolower($name) == 'container'){
            return $this->container;
        }

        if(isset($this->component[$name])){
            return $this->component[$name];
        }else{
            return null;
        }
    }

    public function run()
    {
        Lua::register($this);

        $this->request->dispose();
    }


}