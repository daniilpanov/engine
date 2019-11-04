<?php


namespace app\factories\static_factories;


use app\events\Event;

class EventsFactory extends StaticFactory
{
    public function createEvent($event_name, $params = []): Event
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

    public function registerEvent(Event $event)
    {
        $ar = explode("\\", get_class($event));
        $clazz = end($ar);

        if (!isset(self::$instances[$clazz]))
            self::$instances[$clazz] = [];

        self::$instances[$clazz][] = $event;
    }

    public function runAllEvents($events_name)
    {
        $events_name .= "Ev";

        if (isset(self::$instances[$events_name]))
        {
            foreach (self::$instances[$events_name] as $instance)
            {
                $instance->run();
            }
        }
    }

    public function runEventsByFindString($events_name, $find_str)
    {
        $events_name .= "Ev";

        if (isset(self::$instances[$events_name]))
        {
            foreach (self::$instances[$events_name] as $instance)
            {
                if ($instance->check($find_str))
                    $instance->run();
            }
        }
    }
}