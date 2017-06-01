<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 14:19
 */

return [
    'db_master' => [
        'hostname' => 'localhost',
        'username' => 'root',
        'passwd' => 111111
    ],
    'db_slave' => [
        [
            'hostname' => 'localhost',
            'username' => 'root',
            'passwd' => 111111
        ],
        [
            'hostname' => 'localhost',
            'username' => 'root',
            'passwd' => 111111
        ],
    ]
];