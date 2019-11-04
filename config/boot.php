<?php

/** @var $Kernel \app\Kernel */
global $Kernel;

// Подключавем функции-хелперы
include_lib("helpers");
// и настройки роутера (с помощью регистрации событий)
system_config("router-setup");