<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/26
 * Time: 13:52
 */
namespace app\lib\strategy;

class ManStrategy implements UserStrategy
{
    public function showAd()
    {
        // TODO: Implement showAd() method.
        echo 'iphone 5';
        echo '<br/>';
    }

    public function showCate()
    {
        // TODO: Implement showCate() method.
        echo 'shu ma';
        echo '<br/>';
    }
}