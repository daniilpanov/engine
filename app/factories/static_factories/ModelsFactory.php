<?php


namespace app\factories\static_factories;


class ModelsFactory extends StaticFactory
{
    public function createModel($model_name, $params = [], $register = true)
    {
        $model_name .= "Model";
        $model = "app\\models\\$model_name";
        $inst = new $model(...$params);

        if ($register)
        {
            if (!isset(self::$instances[$model_name]))
            {
                self::$instances[$model_name] = [];
            }

            self::$instances[$model_name][] = $inst;
        }

        return $inst;
    }

    public function createIfNotExists($model_name, $params = [], $register = true)
    {

    }

    public function searchModel($model_name, $params = [], $only_one = false)
    {

    }

    public function createSomeModels($model_name, $params = [], $register = true)
    {

    }
}