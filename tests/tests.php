<?php

$_SERVER['DOCUMENT_ROOT'] = __DIR__ . DIRECTORY_SEPARATOR . "..";
require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "more-functions.php";

system_config("autoload");

\app\commands\RouterCommands::route();