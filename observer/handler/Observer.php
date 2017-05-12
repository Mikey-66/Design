<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/12
 * Time: 9:45
 */
namespace observer\handler;

interface Observer{
    public function handle( $context = array() );
}