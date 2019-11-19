<?php


namespace app\factories;


final class Factory extends SingletonFactory
{
    private static $instance = null;

    public static function __callStatic($name, $arguments)
    {
        if (self::$instance === null)
            self::$instance = new self();

        $name .= "Factory";

        return self::$instance->$name(...$arguments);
    }

    public function modelsFactory(): ModelsFactory
    {
        return $this->get(ModelsFactory::class);
    }

    public function eventsFactory(): EventsFactory
    {
        return $this->get(EventsFactory::class);
    }

    public function commandsFactory(): CommandsFactory
    {
        return $this->get(CommandsFactory::class);
    }

    public function controllersFactory(): ControllersFactory
    {
        return $this->get(ControllersFactory::class);
    }

    public function buildersFactory(): BuildersFactory
    {
        return $this->get(BuildersFactory::class);
    }
}