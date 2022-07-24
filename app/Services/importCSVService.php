<?php

namespace App\Services;

class importCSVService
{
    public function import(string $modelName)
    {
        try {
            $model = getModelByName($modelName);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
        console_log("Preparing to import " . $model->getTableName());
    }


}