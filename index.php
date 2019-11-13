<?php

define("PHP_HOME", $_SERVER['DOCUMENT_ROOT'] . "/engine");
define("PHP_DOMAIN", "http://localhost/engine");

require_once PHP_HOME . "/lib/more-functions.php";

system_config("autoload");

use app\factories\static_factories\StaticFactory;

\app\Kernel::get()->start();

\app\builders\RequestBuilder::$domain = PHP_DOMAIN . "/";

StaticFactory::events()->registerEvent(
    StaticFactory::builders()
        ->createBuilder("Request", \app\controllers\SiteController::class)
        ->method("test")->url("test(.+)/")->get("test", "1")->init()
);

StaticFactory::events()->runEventsByFindString("Request", getUrl());