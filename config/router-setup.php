<?php

/** @var $Kernel \app\Kernel */
global $Kernel;

use app\builders\GetEvBuilder as Get;

Get::$default_controller = \app\controllers\SiteController::class;

/** @var $builder Get */
$builder = factory("builders")->createBuilder("GetEv");

// Call to Kernel to method 'registerEvent' to set a request rule
$Kernel->registerEvent((clone $builder)->get("lng", "([a-z]+)")->method("lng")->init());
$Kernel->registerEvent((clone $builder)->method("index")->init());
$Kernel->registerEvent((clone $builder)->get("page", "reviews")->method("reviews")->init());
$Kernel->registerEvent((clone $builder)->get("page", "contacts")->method("contacts")->init());
$Kernel->registerEvent((clone $builder)->get("page", "([0-9]+)")->method("page")->init());