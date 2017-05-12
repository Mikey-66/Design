<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 10:40
 */
namespace observer\handler;

class Logger implements Observer{

    public function handle( $context = array() ){
        echo "日志记录者记录日志<hr/>";
    }
}