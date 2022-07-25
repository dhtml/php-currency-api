<?php

class Browser
{

    public static function initialize()
    {
        // Create Router instance
        $router = new \Bramus\Router\Router();

        //load routes
        foreach (glob(ROUTE_PATH . "*.php") as $filename) {
            require $filename;
        }
        $router->run();
    }
}