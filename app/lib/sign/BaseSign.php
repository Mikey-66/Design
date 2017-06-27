<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/21
 * Time: 15:53
 */

namespace app\lib\sign;


class BaseSign
{
    protected $sign_obj;

    public function setSignObject(Sign $sign)
    {
        $this->sign_obj = $sign;
    }

    public function verifySign()
    {
        return $this->sign_obj->verify();
    }
}