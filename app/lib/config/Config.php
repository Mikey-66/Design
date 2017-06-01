<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 11:06
 */

namespace app\lib\config;

class Config implements \ArrayAccess
{
    private $data = array();

    protected $path;

    public function __construct($path = CONFIG_DIR)
    {
        $this->path = $path;
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)){
            $file = $this->path . '/' . $offset . '.php';
            $config = require_once $file;
            $this->data[$offset] = $config;
        }

        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)){
            $this->data[] = $value;
        }else{
            $this->data[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)){
            unset($this->data[$offset]);
        }
    }
}