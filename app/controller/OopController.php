<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/1/22
 * Time: 10:58
 */
namespace app\controller;


interface Ability{

    const VIP_LEVEL_1 = "高级";
    public function fly();
}

// 组合
class Crow{

    public $instance;

    public function __construct($instance)
    {
        $this->instance = $instance;
    }

    public function fly(){
        $this->instance->fly();
    }
}

// 继承
class Magpie extends Birds{

    public function fly()
    {
        parent::fly();
    }
}

class Birds{

    public function fly()
    {
        var_dump('birds can fly');
    }
}

class OopController extends BaseController{

    public function actionT1(){
        $bird = new Birds();
        $crow = new Crow($bird);
        $crow->fly();
    }

    public function actionT2(){

        $dir = new \DirectoryIterator(dirname(__FILE__));
        foreach ($dir as $filepath){
            if (!$filepath->isDir()){
                echo $filepath->getFilename() . "\t" . $filepath->getSize() . PHP_EOL;
            }
        }
    }
}