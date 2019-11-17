<?php


namespace app\factories\static_factories;


use app\events\Event;

class EventsFactory extends StaticFactory
{
    public function getAllEvents($events_name = null)
    {
        return ($events_name === null
            ? self::$instances :
            (isset(self::$instances[$events_name])
                ? self::$instances[$events_name]
                : null)
        );
    }

    public function create($event_name, $params = []): Event
    {
        $event = "app\\events\\{$event_name}Ev";
        return new $event(...$params);
    }

    public function createAndRegister($event_name, $params = []): Event
    {
        $event_name .= "Ev";
        $event_namespace = "app\\events\\{$event_name}";

        if (!isset(self::$instances[$event_name]))
            self::$instances[$event_name] = [];

        return self::$instances[$event_name][]
            = new $event_namespace(...$params);
    }

    public function register(Event $event)
    {
        $arr = explode("\\", get_class($event));
        $clazz = end($arr);

        if (!isset(self::$instances[$clazz]))
            self::$instances[$clazz] = [];

        return self::$instances[$clazz][] = $event;
    }

    public function unregister($event_name, $inst = null)
    {
        if ($inst === null)
            unset(self::$instances[$event_name]);
        else
            unset(self::$instances[$event_name][array_search($inst, self::$instances[$event_name])]);
    }
}