<?php

use Bramus\Router\Router;

class Browser
{

    public static function initialize()
    {
        // Create Router instance
        $router = new Router();

        //load routes
        foreach (glob(ROUTE_PATH . "*.php") as $filename) {
            require $filename;
        }
        $router->run();
    }
}