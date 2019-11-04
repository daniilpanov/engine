<?php

require_once "lib/more-functions.php";

$_SERVER['DOCUMENT_ROOT'] .= "/engine";

system_config("autoload");

\app\Kernel::get()->start();

