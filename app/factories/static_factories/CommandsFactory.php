<?php


namespace app\factories\static_factories;


class CommandsFactory extends StaticFactory
{
    public function getCommandClass($command_class, $is_absolute_namespace = false)
    {
        if ($is_absolute_namespace)
        {
            $namespace = $command_class;
            $parsed_namespace = explode("\\", $command_class);
            $command_class = end($parsed_namespace);
        }
        else
        {
            $command_class .= "Commands";
            $namespace = "app\\commands\\$command_class";
        }

        if (!isset(self::$instances[$command_class]))
        {
            self::$instances[$command_class] = new $namespace;
        }

        return self::$instances[$command_class];
    }
}