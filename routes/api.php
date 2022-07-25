<?php
$router->mount('/api', function () use ($router) {
    $router->get('/', function () {
        render_json(['versionCode' => 1.0, 'versionName' => "AgpayTech 1.0"]);
    });
    $router->get('/countries', 'App\Http\Controller\API\CountryController@index');
    $router->get('/currencies', 'App\Http\Controller\API\CurrencyController@index');
});