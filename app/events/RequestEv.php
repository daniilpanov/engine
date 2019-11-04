<?php


namespace app\events;


use app\factories\static_factories\StaticFactory;

class RequestEv extends Event
{
    public function __construct($find_key, $controller, $method = null)
    {
        $func = ($method)
            ? (function ($arguments) use ($controller, $method)
            {
                StaticFactory::controllers()->getController($controller)->$method(...$arguments);
            })
            : (function ($arguments) use ($controller)
            {
                StaticFactory::controllers()->getController($controller)(...$arguments);
            });

        parent::__construct($func, $find_key);
    }

    public function run($params = [])
    {
        parent::run($params);
    }
}