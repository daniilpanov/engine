<?php


namespace app\events;


class RequestEv extends Event
{
    public function __construct($find_key, $controller, $method = null)
    {
        $find_key = str_replace("?", "\?", $find_key);
        $find_key = str_replace("/", "\/", $find_key);

        $func = ($method)
            ? (function ($arguments = []) use ($controller, $method)
            {
                return_factory("controllers")->getController($controller, true)->$method(...$arguments);
            })
            : (function ($arguments = []) use ($controller)
            {
                return_factory("controllers")->getController($controller, true)(...$arguments);
            });

        parent::__construct($func, $find_key);
    }
}