<?php


namespace app\events;


use app\BaseObj;

abstract class Event extends BaseObj
{
    protected $func;

    /**
     * @param $func callable|\Closure
     */
    public function __construct($func)
    {
        $this->func = $func;
    }

    public function run($params = [])
    {
        return call_user_func($this->func, $params);
    }
}