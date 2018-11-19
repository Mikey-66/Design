<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/1/23
 * Time: 10:36
 */
namespace app\lib\test;

class SoftwareManager
{
    public $softwarePool = [
        'Php' => 'app\lib\test\Php',
        'Office' => 'app\lib\test\Office',
        'Warcraft3' => 'app\lib\test\Warcraft3'
    ];

    public function installSoftware($name){
        $bool = $this->checkExist($name);
        if (!$bool){
            echo "fail to install {$name} , cant find software!";
            die();
        }

        $obj = $this->getSoftwareObj($name);

        if ($obj instanceof Software){
            $obj->install();
            echo "<br/>";
            $obj->uninstall();
        }else{
            echo "fail to install {$name} , cant find software!";
        }

    }

    public function getSoftwareObj($name){
        $className = $this->softwarePool[$name];

        if (class_exists($className)){
            return new $className;
        }else{
            return false;
        }
    }

    public function checkExist($name){
        return in_array($name, array_keys($this->softwarePool));
    }

}