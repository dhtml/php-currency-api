<?php

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