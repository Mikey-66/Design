<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/5/27
 * Time: 12:51
 */
namespace app\model;

class BaseModel implements \Iterator
{

    private $index;

    protected $arr = array();


    public function current()
    {
        return $this->arr[$this->index];
        // TODO: Implement current() method.
    }

    public function key()
    {
        return $this->index;
        // TODO: Implement key() method.
    }

    public function next()
    {
        $this->index++;
        // TODO: Implement next() method.
    }

    public function rewind()
    {
        $this->index = 0;
        // TODO: Implement rewind() method.
    }

    public function valid()
    {
        return count($this->arr) > $this->index;
        // TODO: Implement valid() method.
    }

}