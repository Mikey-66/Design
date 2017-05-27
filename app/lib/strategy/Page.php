<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/27
 * Time: 10:32
 */

namespace app\lib\strategy;


class Page
{
    protected $strategy;



    public function index()
    {
        $this->strategy->showAd();

        $this->strategy->showCate();
    }

    public function setStrategy(UserStrategy $strategy)
    {
        $this->strategy = $strategy;
    }
}