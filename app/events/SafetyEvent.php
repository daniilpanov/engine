<?php


namespace app\events;


abstract class SafetyEvent extends Event
{
    /**
     * @param $params mixed
     * @return array|null|bool
     */
    abstract public function preInit($params);
}