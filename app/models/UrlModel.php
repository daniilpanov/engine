<?php


namespace app\models;


class UrlModel extends Model
{
    public $full_url;
    public $scheme;
    public $host;
    public $user;
    public $pass;
    public $path;
    public $query;
    public $fragment;

    public function __construct($url)
    {
        parent::__construct([$url]);
    }

    public static function init($obj, $params = [])
    {
        if (count($params) === 1 && !is_array($params[0]))
        {
            self::setData($obj, parse_url($params[0]));
            $obj->full_url = $params[0];
        }
    }
}