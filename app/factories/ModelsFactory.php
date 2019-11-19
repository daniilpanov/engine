<?php


namespace app\factories;


class ModelsFactory extends MultiFactory
{
    public function createModel($model_name, $params = [], $register = true)
    {
        $model_name .= "Model";
        $model = "app\\models\\$model_name";

        return $this->create($model, $params, $model_name, $register);
    }

    public function createIfNotExists($model_name, $params = [], $group = null, $register = true)
    {
        $model_name .= "Model";
        $model = "app\\models\\$model_name";

        if (!$model_obj = $this->searchModel($model_name, $params, $group, true))
            $model_obj = $this->create($model, $params, $model_name, $register);

        return $model_obj;
    }

    public function searchModel($model_name, $params = [], $group = null, $only_one = false)
    {
        $model_name .= "Model";

        return $this->search($model_name, $params, $group, $only_one);
    }

    public function createSomeModels($model_name, $group_id, $params = [], $register = true)
    {

    }
}