<?php

namespace app\events;


class UrlEv extends RequestEv
{
    private $url;

    public function __construct($url, $controller, $method = null)
    {
        parent::__construct($controller, $method);

        $this->url = $url;
    }

    public function preInit($params): bool
    {
        if (!isset($params['url']))
            return false;

        if (preg_match($this->url, $params['url'], $arguments))
        {
            unset($arguments[0]);
            return $arguments;
        }

        return null;
    }
}