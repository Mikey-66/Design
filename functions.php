<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/24
 * Time: 10:49
 */
if (!function_exists('dd')){
    function dd($var, $header = true, $echo = true, $label = null, $strict = true) {
        static $has_dump;

        if(!$has_dump && $header){
            header('Content-Type:text/html; charset=utf-8');
        }

        $has_dump = true;

        $label = ($label === null) ? '' : rtrim($label) . ' ';
        if (!$strict) {
            if (ini_get('html_errors')) {
                $output = '<pre>' . $label . htmlspecialchars(print_r($var, true), ENT_QUOTES) . '</pre>';
            } else {
                $output = '<pre>' . $label . print_r($var, true) . '</pre>';
            }
        } else {
            ob_start();
            var_dump($var);
            $output = ob_get_clean();
            if (!extension_loaded('xdebug')) {
                $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            }
        }
        if ($echo) {
            echo($output);
            return null;
        } else
            return $output;
    }
}

/**
 * 简单对称加密算法之加密
 */
function email_encode($string = '', $skey = 'starcor') {
    $strArr 	= str_split(base64_encode($string));
    $strCount 	= count($strArr);
    foreach (str_split($skey) as $key => $value)
    {
        $key < $strCount && $strArr[$key].=$value;
    }
    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}

/**
 * 简单对称加密算法之解密
 */
function email_decode($string = '', $skey = 'starcor') {
    $strArr 	= str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
    $strCount 	= count($strArr);
    foreach (str_split($skey) as $key => $value)
    {
        $key <= $strCount && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
    }
    return base64_decode(join('', $strArr));
}