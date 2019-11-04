<?php


namespace app\commands;


use app\factories\static_factories\StaticFactory;

class RouterCommands extends Command
{
    public function routeC()
    {
        $requests = StaticFactory::models()->searchModel("Request");

        if ($requests)
        {
            foreach ($requests as $request)
            {
                // Take the needle params from model, generate the FindStr and call to events by FindStr
            }
        }
    }
}