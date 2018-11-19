<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/1/23
 * Time: 10:09
 */
namespace app\lib\test;

interface Software{

    public function install();

    public function uninstall();

    public function restore();
}