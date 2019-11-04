<?php


namespace app\models;


use app\BaseObj;

abstract class Model extends BaseObj
{
    public function __construct($params = [])
    {
        static::init($this, $params);
    }

    abstract public static function init($obj, $params = []);

    protected function setData($data_arr)
    {
        foreach ($data_arr as $col => $value)
        {
            $this->$col = $value;
        }
    }
}