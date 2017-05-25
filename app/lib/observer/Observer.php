<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 11:35
 */
namespace app\lib\observer;

interface Observer
{
    public function handle($context = array());
}