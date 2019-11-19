<?php


namespace app\commands;


use app\helpers\Url;
use engine\baseOf\EventKernel;

class RouterCommands extends Command
{
    public function routeC()
    {
        EventKernel::get()->runBy("Get", $_GET);
        EventKernel::get()->runBy("Post", $_POST);
        EventKernel::get()->runBy("Url", Url::getOnlyUri());
    }
}