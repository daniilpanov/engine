<?php


namespace app\factories;


use app\events\Event;

class EventsFactory extends MultiFactory
{
    public function getAllEvents($events_name = null)
    {
        return ($events_name === null
            ? $this->instances :
            (isset($this->instances[$events_name])
                ? $this->instances[$events_name]
                : null)
        );
    }

    public function createEvent($event_name, $params = []): Event
    {
        $event_name .= "Ev";
        $event = "app\\events\\$event_name";
        return $this->create($event, $params, $event_name, false);
    }

    public function createAndRegister($event_name, $params = []): Event
    {
        $event_name .= "Ev";
        $event_namespace = "app\\events\\{$event_name}";

        return $this->create($event_namespace, $params, $event_name, true);
    }

    public function registerEvent(Event $event)
    {
        $arr = explode("\\", get_class($event));
        $clazz = end($arr);

        return $this->register($event, $clazz);
    }

    public function unregister($event_name, $inst = null)
    {
        /*if ($inst === null)
            unset(self::$instances[$event_name]);
        else
            unset(self::$instances[$event_name][array_search($inst, self::$instances[$event_name])]);*/
    }
}