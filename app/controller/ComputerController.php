<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/1/23
 * Time: 10:26
 */
namespace app\controller;

use app\lib\test\Lenovo;
use app\lib\test\SoftwareManager;
use app\lib\test\Warcraft3;

class ComputerController extends BaseController{

    public function actionT1(){

        $softwareManager = new SoftwareManager();

        $computer = new Lenovo($softwareManager);

        $computer->softwareManager->installSoftware('Warcraft3');

    }
}