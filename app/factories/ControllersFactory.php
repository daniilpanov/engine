<?php


namespace app\factories;


class ControllersFactory extends SingletonFactory
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

        return $this->get($controller_name, $namespace);
    }
}