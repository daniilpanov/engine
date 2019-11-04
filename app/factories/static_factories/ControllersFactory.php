<?php


namespace app\factories\static_factories;


class ControllersFactory extends StaticFactory
{
    public function getController($controller_name, $is_absolute_namespace = false)
    {
        if ($is_absolute_namespace)
        {
            $namespace = $controller_name;
            $parsed_namespace = explode("\\", $controller_name);
            $controller_name = end($parsed_namespace);
        }
        else
        {
            $controller_name .= "Controller";
            $namespace = "app\\controllers\\$controller_name";
        }

        if (!isset(self::$instances[$controller_name]))
            self::$instances[$controller_name] = new $namespace;

        return self::$instances[$controller_name];
    }
}