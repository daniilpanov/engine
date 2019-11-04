<?php


namespace app\factories\static_factories;


use app\BaseObj;

abstract class StaticFactory extends BaseObj
{
    protected static $instances;
    private static $factories;

    public static function models(): ModelsFactory
    {
        return self::factory(ModelsFactory::class);
    }

    public static function events(): EventsFactory
    {
        return self::factory(EventsFactory::class);
    }

    public static function commands(): CommandsFactory
    {
        return self::factory(CommandsFactory::class);
    }

    public static function controllers(): ControllersFactory
    {
        return self::factory(ControllersFactory::class);
    }

    public static function factory($factory)
    {
        if (!isset(self::$factories[$factory]))
        {
            self::$factories[$factory] = new $factory;
        }

        return self::$factories[$factory];
    }
}