<?php


namespace app\factories;


use app\BaseObj;

class SingletonFactory extends BaseObj
{
    protected $instances;

    protected function get($object_key, $object_namespace = null)
    {
        return (isset($this->instances[$object_key])
            ? $this->instances[$object_key]
            : ($this->instances[$object_key] =
                ($object_namespace == null
                    ? new $object_key()
                    : new $object_namespace()
                )
            )
        );
    }
}