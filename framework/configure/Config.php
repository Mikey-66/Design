<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/18
 * Time: 11:36
 */

namespace framework\configure;


class Config implements \ArrayAccess
{
    protected $config_dir = CONFIG_DIR;

    private $data = array();

    public function __construct($fileName)
    {
        $this->load($fileName);
    }

    public function load($fileName)
    {
        $this->data = include $this->config_dir . "/" . $fileName . '.php';  // 如果文件以及加载过了，会返回true
    }

    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)){
            unset($this->data[$offset]);
        }
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)){
            $this->data[] = $value;
        }else{
            $this->data[$offset] = $value;
        }
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }


}