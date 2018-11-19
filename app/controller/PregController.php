<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2018/4/3
 * Time: 17:42
 */
namespace app\controller;

class PregController extends BaseController
{

    /**
     * 贪婪匹配 懒惰匹配
     *
     *          *号紧跟+或者*号表示进行懒惰匹配，默认情况下*和+都是进行贪婪匹配
     */
    public function actionT1()
    {
        $str1 = "AAAAAAAAAAAAAAAAAAAABBBBBCCC";

        $r1 = preg_match('/A.*/', $str1, $matches);
        $r2 = preg_match('/A+B.*?/', $str1, $matches2);
        $r3 = preg_match('/A+?/', $str1, $matches3);

        var_dump($r1, $matches);
        var_dump($r2, $matches2);
        var_dump($r3, $matches3);

    }

    //---------------------------------------------------------------
    // 正则表达式元字符

    /**
     * (pattern) 匹配并获取  PS：用不用中括号括起来的区别
     */
    public function actionT2()
    {
        $str3 = "/vod/0010305654_E00000005201708281724210087819705_4205.m3u8";

        /**
         * array
            0 => string '_E00000005201708281724210087819705_4205.m3u8'
         */
        $r4 = preg_match('/_E.*/', $str3, $matches4);

        /**
         * array
            0 => string '_E00000005201708281724210087819705_4205.m3u8'
            1 => string '00000005201708281724210087819705'  子表达式(\d+)的匹配值
            2 => string '_4205.m3u8' (length=10)            子表达式(_.*)的匹配值
         */
        $r5 = preg_match('/_E(\d+)(_.*)/', $str3, $matches5);

        var_dump($r4, $matches4);
        var_dump($r5, $matches5);
    }

    /**
     * (?:pattern) 匹配但不获取匹配 PS 注意和上面这个例子的区别
     */
    public function actionT3()
    {
        $str3 = "/vod/0010305654_E00000005201708281724210087819705_4205.m3u8";

        /**
         * array
            0 => string '_E00000005201708281724210087819705_4205.m3u8'
            1 => string '_4205.m3u8'                                    // 子表达式(_.*) 的匹配
         *
         *  注意这里没有取到(?:\d)的匹配，因为(?:pattern) 是非获取匹配
         */
        $r5 = preg_match('/_E(?:\d+)(_.*)/', $str3, $matches5);

        var_dump($r5, $matches5);
    }

    /**
     *  预查  正向肯定预查 正向否定预查  反向肯定预查 反向否定预查
     *  PS: 预查都是非获取匹配
     *  (?=pattern)
     *  (?!pattern)
     *  (?<=pattern)
     *  (?<!pattern)
     */
    public function actionT4()
    {
        // 目标 截取 E00000005201708281724210087819705
        $str3 = "/vod/0010305654_E00000005201708281724210087819705_4205.m3u8";

        $r4 = preg_match('/(?<=_).+(?=\.)/', $str3, $matches4);
        var_dump($r4, $matches4);
    }
}