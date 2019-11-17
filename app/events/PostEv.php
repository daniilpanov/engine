<?php

namespace app\events;


class PostEv extends RequestEv
{
    private $post;

    public function __construct($post, $controller, $method = null)
    {
        parent::__construct($controller, $method);

        $this->post = $post;
    }

    public function check($params): bool
    {

    }
}