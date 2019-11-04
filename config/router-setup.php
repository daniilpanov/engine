<?php

/** @var $Kernel \app\Kernel */
global $Kernel;

// Call to Kernel to method 'registerEvent' to set a request rule
$Kernel->registerEvent("NOTHING", "Site", "index");
$Kernel->registerEvent("page=reviews", "Site", "reviews");
$Kernel->registerEvent("page=contacts", "Site", "contacts");
$Kernel->registerEvent("page=([0-9]+)", "Site", "page");