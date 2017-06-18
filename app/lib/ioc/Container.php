<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/17
 * Time: 22:47
 */

# 基础 ioc容器

namespace app\lib\ioc;

class Container
{
    protected $binds;

    protected $instances;

    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof \Closure) {
            $this->binds[$abstract] = $concrete;  // 绑定生产类实例的脚本（闭包函数）
        } else {
            $this->instances[$abstract] = $concrete; // 绑定类实例
        }
    }

    public function make($abstract, $options = [])
    {
        # 可以绑定类实例，下次调用make时，直接返回对象
        if (isset($this->instances[$abstract])){
            return $this->instances[$abstract];
        }

        # 将容器实例插入参数数组第一个元素，目的是在运行生产主对象（超人）匿名函数时，
        # 可以再次调用容器的make方法以生产超人的依赖对象（各种超能力）
        array_unshift($options, $this);

        # 生产类对象的匿名函数的第一个参数一定是容器对象实例 ！！
        return call_user_func_array($this->binds[$abstract], $options);
    }

    public function getBinds()
    {
        return $this->binds;
    }


}