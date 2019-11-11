<?php


namespace app\events;


use app\BaseObj;

abstract class Event extends BaseObj
{
    protected $find_key = null;
    protected $func;

    public function __construct($func, $find_key = null)
    {
        $this->func = $func;
        $this->find_key = $find_key;
    }

    public function check($str)
    {
        if ($this->find_key === null)
            return true;

        if (preg_match("/" . $this->find_key . "/", $str, $matches))
            return $matches;

        return false;
    }

    public function run($params = [])
    {
        return call_user_func_array($this->func, $params);
    }
}