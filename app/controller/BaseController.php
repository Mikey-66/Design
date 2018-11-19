<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/24
 * Time: 14:32
 */
namespace app\controller;

class BaseController
{

    public function render($view, $variables){
        $viewPath = ROOT_DIR. '/app/view/' . str_replace('.', '/', $view) . '.php';

        if (!file_exists($viewPath)){
            die('view file not exist');
        }

        $view = file_get_contents($viewPath);

        $view= preg_replace('/\{\$x\}/', $variables['x'], $view, -1, $count);

        echo $view;
    }

    public function render2($view, $variables = null){
        $viewPath = ROOT_DIR. '/app/view/' . str_replace('.', '/', $view) . '.php';

        if (!file_exists($viewPath)){
            die('view file not exist');
        }

        if (!is_null($variables))
        {
            extract($variables);
        }
        //var_dump(get_defined_vars());exit;

        include $viewPath;

        //echo $page;
    }
}