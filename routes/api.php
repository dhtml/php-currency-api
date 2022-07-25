<?php
$router->mount('/api', function() use ($router) {
    $router->get('/countries', 'App\Http\Controller\API\CountryController@index');
    $router->get('/currencies', 'App\Http\Controller\API\CurrencyController@index');
});