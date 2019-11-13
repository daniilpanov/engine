<?php


namespace app\builders;


use app\factories\static_factories\StaticFactory;

class RequestBuilder extends Builder
{
    public static $default_controller;
    public static $domain = null;

    public $url = "";
    public $get = [];
    public $controller, $method = null;

    public function __construct($controller = null)
    {
        $this->controller = ($controller === null) ? self::$default_controller : $controller;
        $this->url = self::$domain;
    }

    public function method($method)
    {
        $this->method = $method;
        return $this;
    }

    public function url($url)
    {
        $this->url = (self::$domain ? (self::$domain . $url) : $url);
        return $this;
    }

    public function get($key = null, $value = null)
    {
        $this->get[] = ['key' => $key, 'value' => $value];
        return $this;
    }

    public function init()
    {
        $full_url = $this->url;

        if (!empty($this->get))
        {
            if ($this->get[0]['key'] === null)
                return StaticFactory::events()
                    ->createEvent(
                        "Request",
                        [$full_url, $this->controller, $this->method]
                    );

            $full_url .= "?";

            foreach ($this->get as $item)
            {
                $full_url .= ($item['value'] ? ($item['key'] . "=" . $item['value']) : $item['key']) . "&";
            }

            $full_url = substr($full_url, 0, -1);
        }

        return StaticFactory::events()
            ->createEvent(
                "Request",
                [$full_url, $this->controller, $this->method]
            );
    }
}