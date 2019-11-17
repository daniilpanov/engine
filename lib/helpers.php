<?php

function global_factory()
{
    return \app\factories\static_factories\StaticFactory::class;
}

function factory($factory)
{
    return global_factory()::$factory();
}