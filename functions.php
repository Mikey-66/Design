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