<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/17
 * Time: 22:15
 */
namespace app\lib\ioc;

class SuperModuleFactory
{
    public static function makeModule($moduleName, $options)
    {
        switch ($moduleName) {
            case 'Fly':
                return new Fly($options[0], $options[1]);
                break;
            case 'Shot':
                return new Shot($options[0], $options[1], $options[2]);
                break;
            case 'Force':
                return new Force($options[0]);
                break;
            //case 'more': ...

            //case 'and more': ...

            //case 'and more': ...

            //case 'oh no! its too many!': ...

            default:
                break;
        }
    }
}