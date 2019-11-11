<?php


namespace app\builders;


use app\factories\static_factories\StaticFactory;

class RequestBuilder extends Builder
{
    public static $default_controller;

    public $url = "";
    public $get = [];
    public $controller, $method = null;

    public function __construct($controller = null)
    {
        $this->controller = ($controller === null) ? self::$default_controller : $controller;
    }

    public function method($method)
    {
        $this->method = $method;
    }

    public function url($url)
    {
        $this->url = $url;
    }

    public function get($key = null, $value = null)
    {
        $this->get[] = ['key' => $key, 'value' => $value];
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
        }

        return StaticFactory::events()
            ->createEvent(
                "Request",
                [$full_url, $this->controller, $this->method]
            );
    }
}