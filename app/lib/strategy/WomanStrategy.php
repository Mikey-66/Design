<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/26
 * Time: 13:56
 */
namespace app\lib\strategy;

class WomanStrategy implements UserStrategy
{
    public function showAd()
    {
        // TODO: Implement showAd() method.
        echo 'LV';
        echo '<br/>';
    }

    public function showCate()
    {
        // TODO: Implement showCate() method.
        echo 'bao bao';
        echo '<br/>';
    }
}