<?php


namespace app\commands;


use app\BaseObj;
use app\factories\Factory;

abstract class Command extends BaseObj
{
    public static function __callStatic($name, $arguments)
    {
        $name .= "C";
        return Factory::commands()
            ->getCommandClass(static::class, true)
            ->$name(...$arguments);
    }
}