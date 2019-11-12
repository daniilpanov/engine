<?php


namespace app\helpers;


use app\models\UrlModel;

class Url extends Helper
{
    /** @var UrlModel|null $model */
    private static $model = null;

    public static function init($model)
    {
        self::$model = $model;
    }

    public static function getFullUrl()
    {
        return self::$model->full_url;
    }

    public static function getRequestInfo()
    {
        return self::$model->query;
    }

    public static function getUrl()
    {
        return self::$model->path;
    }

    public static function getOnlyUri()
    {
        return self::$model->scheme . "://" . self::$model->host . self::$model->path;
    }

    public static function getUserInfo()
    {
        return ['username' => self::$model->user, 'password' => self::$model->pass];
    }

    public static function getScheme()
    {
        return self::$model->scheme;
    }

    public static function getFragment()
    {
        return self::$model->fragment;
    }
}