<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 11:27
 */

return array(
    'master' =>  array(
        'host' => 'localhost',
        'username' => 'root',
        'passwd' => 111111,
    ),

    'slave' => array(
        array(
            'host' => 'localhost',
            'username' => 'root',
            'passwd' => 111111,
        ),
        array(
            'host' => 'localhost',
            'username' => 'root',
            'passwd' => 111111,
        )
    )

);