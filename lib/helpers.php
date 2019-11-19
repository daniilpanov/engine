<?php

function global_factory()
{
    return \app\factories\Factory::class;
}

function factory($factory)
{
    return global_factory()::$factory();
}