<?php

use App\Core\Model;

/**
 * Search for namespaces match
 * @param string $namespace
 * @return array
 */
function get_current_namespaces($namespace = "/")
{
    $namespace = str_replace("/", "\\", $namespace);
    $result = [];
    foreach (get_declared_classes() as $name) {
        if (strpos($name, $namespace) !== false) {
            $result[] = $name;
        }
    }
    return $result;
}

/**
 * Log message to CLI
 * @param $message
 */
function console_log($message) {
    $STDERR = fopen("php://stderr", "w");
    fwrite($STDERR, $message."\n");
    fclose($STDERR);
}

/**
 * @param string $modelName
 * @return Model
 * @throws Exception
 */
function getModelByName(string $modelName)
{
    $modelNameSpace = "\\App\\Models\\".$modelName;
    $model = new $modelNameSpace();
    if($model instanceof Model) {
        return $model;
    } else {
        throw new \Exception("No model found called $modelNameSpace");
    }
}
