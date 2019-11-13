<?php


namespace app\factories\static_factories;


use app\builders\Builder;

class BuildersFactory extends StaticFactory
{
    public function createBuilder($builder_name, ...$params): Builder
    {
        $builder_name = "app\\builders\\{$builder_name}Builder";
        return new $builder_name(...$params);
    }
}