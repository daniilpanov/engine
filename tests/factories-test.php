<?php

require_once "../lib/more-functions.php";

$_SERVER['DOCUMENT_ROOT'] = "C:/xampp/htdocs/engine";

system_config("autoload");


use app\factories\static_factories\StaticFactory;

var_dump(StaticFactory::models()->createModel("Test"));

