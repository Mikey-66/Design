<?php
/**
 * Created by PhpStorm.
 * User: Jie Liu
 * Date: 2017/6/1
 * Time: 20:41
 */

namespace framework;

class SqlBuilder
{
    private static $instance;

    private $sql;

    protected $parts = array();

    private function __construct()
    {
    }

    public static function Query()
    {
        if (!self::$instance){
            return self::$instance = new self();
        }
        self::$instance->reset();
        return self::$instance;
    }

    public function reset()
    {
        $this->sql = null;
        $this->parts = array();
    }

    public function getSql()
    {
        if (!empty($this->parts)){
            $this->assembleSql();
        }

        return $this->sql;
    }

    public function assembleSql()
    {
        $this->_assembleSelect();
        $this->_assembleFrom();
        $this->_assembleLeftJoin();
        $this->_assembleWhere();
        $this->_assembleOrderBy();
        $this->_assembleLimit();

    }

    private function _assembleSelect()
    {
        $select = "SELECT ";
        if (isset($this->parts['select'])){
            $select .= $this->parts['select'] . ' ';
        }else{
            $select .= "*" . ' ';
        }

        $this->sql .= $select;
    }

    private function _assembleFrom()
    {
        $from = "FROM ";
        if (isset($this->parts['from'])) {
            $from .= $this->parts['from'] . ' ';
        }else{
            die('sql [FROM] part missed!');
        }

        $this->sql .= $from;
    }

    private function _assembleLeftJoin()
    {
        $leftJoin = "LEFT JOIN ";
        $arr = array();
        if (isset($this->parts['leftJoin'])){
            foreach ($this->parts['leftJoin'] as $join){
                $arr[] = $leftJoin . $join[0] . ' ON ' . $join[1];
            }

            $this->sql .= implode(' ', $arr) . ' ';
        }
    }

    private function _assembleWhere()
    {
        $where = "WHERE ";

        $arr = array();

        if (isset($this->parts['where']['and'])) {
            foreach ($this->parts['where']['and'] as $aw){
                $arr['and'][] = "( {$aw} )";
            }
            $andWhere = implode(' AND ', $arr['and']);
        }

        if (isset($this->parts['where']['or'])) {
            foreach ($this->parts['where']['or'] as $ow){
                $arr['or'][] = "( {$ow} )";
            }
            $orWhere = implode(' OR ', $arr['or']);
        }

        if(isset($andWhere) && isset($orWhere)){
            $this->sql .= $where . $andWhere . ' OR ' . $orWhere;
            return $this;
        }

        if (isset($andWhere) || isset($orWhere)){
            $cond = isset($andWhere) ? $andWhere : $orWhere;
            $this->sql .= $where . $cond;
        }
    }

    private function _assembleLimit()
    {
        $limit = " LIMIT ";

        if (isset($this->parts['offset']) && isset($this->parts['limit'])){
            $limit .= "{$this->parts['offset']},{$this->parts['limit']}";
            $this->sql .= $limit;
            return;
        }elseif (isset($this->parts['limit']) && !isset($this->parts['offset'])){
            $limit .= "{$this->parts['limit']}";
            $this->sql .= $limit;
            return;
        }elseif (!isset($this->parts['limit']) && isset($this->parts['offset'])){
            die('sql [LIMIT] part error');
        }
    }

    private function _assembleOrderBy(){
        $orderBy = " ORDER BY ";
        if (isset($this->parts['orderBy'])){
            $orderBy .= $this->parts['orderBy'];
            $this->sql .= $orderBy;
        }

    }


    public function from($str)
    {
        $this->parts['from'] = $str;
        return $this;
    }

    public function select($str)
    {
        $this->parts['select'] = $str;
        return $this;
    }

    public function where($str, $type = 'and')
    {
//        dd($str);exit;
        $this->parts['where'][$type][] = $str;

        return $this;
    }

    public function andWhere($str)
    {
        return $this->where($str);
    }

    public function orWhere($str)
    {
        return $this->where($str, 'or');
    }

    public function leftJoin($str, $on)
    {
        $this->parts['leftJoin'][] = array($str, $on);
        return $this;
    }

    public function innerJoin($str, $on)
    {
        $this->parts['innerJoin'][] = array($str, $on);
        return $this;
    }

    public function rightJoin($str, $on)
    {
        $this->parts['rightJoin'][] = array($str, $on);
        return $this;
    }

    public function orderBy($str)
    {
        $this->parts['orderBy'] = $str;
        return $this;
    }

    /**
     *
     * @param $int
     * @return $this
     */
    public function limit($int)
    {
        $this->parts['limit'] = $int;
        return $this;
    }

    /**
     * @param $int
     * @return $this
     * 此方法必须配合limit()使用，单独调用会报错
     */
    public function offset($int)
    {
        $this->parts['offset'] = $int;
        return $this;
    }

    public function groupBy($str)
    {
        $this->parts['groupBy'] = $str;
        return $this;
    }

    public function having($str, $type = 'and')
    {
        $this->parts['having'][] = array($str, $type);
        return $this;
    }

}