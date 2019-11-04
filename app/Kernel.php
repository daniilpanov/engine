<?php


namespace app;


use app\commands\RouterCommands;
use app\factories\static_factories\StaticFactory;

class Kernel
{
    private static $instance = null;
    
    public static function get(): self
    {
        if (self::$instance === null)
        {
            self::$instance = new self;
        }
        
        return self::$instance;
    }

    public function start()
    {
        //
        $GLOBALS['Kernel'] = $this;
        // Boot
        system_config("boot");

        //


        // Routing
        RouterCommands::route();
    }

    public function registerEvent($key_value_regex, $controller, $method = null)
    {
        // Call to EventsFactory and register an request event

    }

    private function registerRequestModel($request)
    {
        // Create a model by request info

    }

    private function registerRequests($requests_data)
    {
        // Create any models by requests data

        foreach ($requests_data as $key => $requests_datum)
        {

        }
    }
}