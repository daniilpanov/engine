<?php


namespace app\commands;


use app\BaseObj;
use app\factories\static_factories\StaticFactory;

abstract class Command extends BaseObj
{
    public static function __callStatic($name, $arguments)
    {
        $name .= "C";
        return StaticFactory::commands()
            ->getCommandClass(static::class, true)
            ->$name(...$arguments);
    }
}