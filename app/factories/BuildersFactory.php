<?php


namespace app\factories;


use app\BaseObj;
use app\builders\Builder;

class BuildersFactory extends BaseObj
{
    public function createBuilder($builder_name, ...$params): Builder
    {
        $builder_name = "app\\builders\\{$builder_name}Builder";
        return new $builder_name(...$params);
    }
}