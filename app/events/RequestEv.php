<?php


namespace app\events;


abstract class RequestEv extends SafetyEvent
{
    public function __construct($controller, $method = null)
    {
        $func = ($method)
            ? (function ($arguments = []) use ($controller, $method)
            {
                factory("controllers")->getController($controller, true)->$method(...$arguments);
            })
            : (function ($arguments = []) use ($controller)
            {
                factory("controllers")->getController($controller, true)(...$arguments);
            });

        parent::__construct($func);
    }

    protected function oneLevel($array)
    {
        $arr = [];

        foreach ($array as $item)
        {
            if (!is_array($item))
            {
                $arr[] = $item;
                continue;
            }

            foreach ($item as $item2)
            {
                $arr[] = $item2;
            }
        }

        return $arr;
    }
}