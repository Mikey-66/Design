<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/18
 * Time: 15:29
 */

namespace framework\response;

class Response
{
    public function json($data)
    {
        header('Content-Type:application/json');
        echo json_encode($data);
    }
}