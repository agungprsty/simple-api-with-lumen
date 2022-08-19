<?php

$router->group([
    'middleware' => 'api',
    'prefix' => 'api'
], function () use ($router) {
    // Authentication 
    $router->group([
        'prefix' => 'auth'
    ], function () use ($router) {
        $router->post('login', 'AuthController@login');
        $router->post('refresh', 'AuthController@refresh');
        $router->post('logout', 'AuthController@logout');
    });

    // Profile 
    $router->group([
        'prefix' => 'profile'
    ], function ($router) {
        $router->get('me', "ProfileController@me");
        $router->get('hello', "ProfileController@sayHello");
    });
});
