<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 10:49
 */
namespace observer\handler;

class Authorizer implements Observer{

    public function handle( $context = array() ){
        var_dump($context);
        echo "更改影片授权信息<hr/>";
    }
}