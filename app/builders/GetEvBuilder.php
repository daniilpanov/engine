<?php


namespace app\builders;


use engine\baseOf\EventKernel;

class GetEvBuilder extends Builder
{
    public static $default_controller = null;

    public $controller, $method = null, $get = null;

    public function __construct()
    {
        $this->controller = self::$default_controller;
    }

    public function controller($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    public function method($method)
    {
        $this->method = $method;
        return $this;
    }

    public function get($key = null, $value = null)
    {
        $this->get[$key] = $value;
        return $this;
    }

    public function init()
    {
        return EventKernel::get()->create("Get", $this->get, $this->controller, $this->method);
    }
}