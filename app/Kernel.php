<?php


namespace app;


use app\commands\RouterCommands;
use app\factories\static_factories\StaticFactory;
use app\helpers\Url;
use engine\baseOf\EventKernel;

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

        //
        Url::init(StaticFactory::models()->createModel("Url", [getUrl()]));
        // Routing
        RouterCommands::route();
    }

    public function registerEvent($requestEv)
    {
        EventKernel::get()->register($requestEv);
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