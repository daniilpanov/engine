<?php


namespace app\factories;


use app\BaseObj;

class MultiFactory extends BaseObj
{
    protected $instances;

    protected function create($class, $params = [], $object_key = null, $save = true, $group = null)
    {
        if ($object_key === null)
            $object_key = $class;

        return ($save
            ? $this->register(new $class(...$params), $object_key, $group)
            : new $class(...$params));
    }

    protected function register($obj, $key, $group = null)
    {
        if ($group === null)
            $instances = &$this->instances[$key];
        else
            $instances = &$this->instances[$key][$group];

        return $instances[] = $obj;
    }

    public function search($object, $params, $group = null, $one = false)
    {
        $instances = ($group !== null ? $this->instances[$object][$group] : $this->instances[$object]);
        $inst = [];

        foreach ($instances as $instance)
        {
            $found = true;

            foreach ($params as $property => $value)
            {
                if (!isset($instance->$property) || $instance->$property != $value)
                {
                    $found = false;
                    break;
                }
            }

            if ($one)
                return $instance;

            if ($found)
                $inst[] = $instance;
        }

        return $inst;
    }
}