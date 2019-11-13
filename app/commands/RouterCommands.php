<?php


namespace app\commands;


use app\helpers\Url;

class RouterCommands extends Command
{
    public function routeC()
    {
        return_factory("events")->runEventsByFindString("Request", Url::getFullUrl());
    }
}