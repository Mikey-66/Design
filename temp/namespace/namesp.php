<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/25
 * Time: 17:57
 */

/*
 * namespace  作用
 * 1】 声明 命名空间
 * 2】 进行 命名空间切换
 */

# 注意
# 1】一个文件中如果有命名空间声明，那么这个文件的最开始必须先声明命名空间，否则报以下错误
#       Fatal error: Namespace declaration statement has to be the very first statement in the script
# 2】命名空间影响 类、常量、函数，但是变量不受影响
# 3】对于有使用include 引入文件的情况 ，如A文件引入了B文件
#       若B文件声明了命名空间，那么那一次声明不会对A文件产生影响
#       （A文件中的类，函数，常量会在A中声明的命名空间中，如果没有声明命名空间，那么是在根（这个词是我自己起的）命名空间中）
#       若A文件声明了命名空间，那么那一次声明也不会对B文件产生影响
#       （B文件中的类，函数，常量会在B中声明的命名空间中，如果没有声明命名空间，那么是在根（这个词是我自己起的）命名空间中）


//echo 'begin'  . '<hr/>';

namespace ns1;

function t1(){
    echo 'ns1_func';
}

class Dog{

}

$x = 10;

const DIR = 'sdsdsd1';

echo __NAMESPACE__ . '<hr/>';

# 访问nametest 和 nametest2 注释以下代码


namespace ns2;

function t1(){
    echo 'ns2_func';
}

class Dog{

}

$x = 1;

const DIR = 'sdsdsd2';


namespace ns1;

echo __NAMESPACE__ . '<hr/>';

echo t1() . '<hr/>';

echo DIR . '<hr/>';

echo $x . '<hr/>';

namespace ns2;

echo __NAMESPACE__ . '<hr/>';

echo t1() . '<hr/>';

echo DIR . '<hr/>';

echo $x . '<hr/>';



