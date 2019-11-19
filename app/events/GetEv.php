<?php


namespace app\events;


class GetEv extends RequestEv
{
    public $get;

    public function __construct($get, $controller, $method = null)
    {
        parent::__construct($controller, $method);

        $this->get = $get;
    }

    public function preInit($get)
    {
        if ($this->get === null)
            return ($get === null ? true : false);

        $found = [];

        foreach ($this->get as $key => $value)
        {
            if (!isset($get[$key]))
                return false;

            if ($value == null)
                return ($get[$key] == null);

            if (preg_match("/$value/", $get[$key], $params))
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