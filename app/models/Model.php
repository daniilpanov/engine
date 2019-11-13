<?php


namespace app\models;


use app\BaseObj;

abstract class Model extends BaseObj
{
    public function __construct($params = [])
    {
        static::init($this, $params);
    }

    abstract public static function init(self $obj, $params = []);

    protected static function setData($obj, $data_arr)
    {
        foreach ($data_arr as $col => $value)
        {
            $obj->$col = $value;
        }
    }
}