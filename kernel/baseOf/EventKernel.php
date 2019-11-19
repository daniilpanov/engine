<?php


namespace engine\baseOf;


use app\events\Event;
use app\events\SafetyEvent;
use app\factories\Factory;

class EventKernel
{
    private static $inst = null;

    public static function get()
    {
        return (self::$inst === null ? (self::$inst = new self) : self::$inst);
    }

    protected function __construct()
    {
    }

    public function run($events_name)
    {
        $events_name .= "Ev";

        /** @var $instances Event[] */
        if ($instances = Factory::events()->getAllEvents($events_name))
        {
            foreach ($instances as $instance)
            {
                $instance->run();
            }

            Factory::events()->unregister($events_name);
        }
    }

    public function runBy($events_name, $params)
    {
        $events_name .= "Ev";

        /** @var $instances SafetyEvent[] */
        if ($instances = Factory::events()->getAllEvents($events_name))
        {
            foreach ($instances as $key => $instance)
            {
                if (($params2 = $instance->preInit($params)) !== false)
                {
                    if ($params2 === null || $params2 === true)
                        $instance->run();
                    else
                        $instance->run($params2);
                    //StaticFactory::events()->unregister($events_name, $instances[$events_name][$key]);
                }
            }
        }
    }

    public function create($event, ...$params)
    {
        return Factory::events()->createEvent($event, $params);
    }

    public function register(Event $event)
    {
        return Factory::events()->registerEvent($event);
    }

    public function createAndRegister($event, ...$params)
    {
        return Factory::events()->createAndRegister($event, $params);
    }
}