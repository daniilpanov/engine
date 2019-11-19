<?php

namespace app\events;


class PostEv extends RequestEv
{
    public $post;

    public function __construct($post, $controller, $method = null)
    {
        parent::__construct($controller, $method);

        $this->post = $post;
    }

    public function preInit($post)
    {
        if ($this->post === null)
            return ($post === null ? true : false);

        $found = [];

        foreach ($this->post as $key => $value)
        {
            if (!isset($get[$key]))
                return false;

            if ($value == null)
                return ($post[$key] == null);

            if (preg_match("/$value/", $post[$key], $params))
            {
                unset($params[0]);

                if (!empty($params))
                    $found[] = $params;
            }
            else
                return false;
        }

        return (!empty($found) ? $this->oneLevel($found) : true);
    }
}