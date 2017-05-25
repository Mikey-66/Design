<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 12:44
 */
include_once dirname(dirname(__FILE__)) . '/autoload.php';  // 后续迁移到入口脚本

use autoloader\animal\Cat;
use autoloader\Dog;

$dog = new Dog();
$cat = new Cat();
//$dog->__destruct();       // 测试析构方法 被调用的时机
unset($dog);
echo '<br/>sdsd<br/>';



//echo $dog->age;
