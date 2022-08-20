<?php

$router->group([
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
        'middleware' => 'api',
        'prefix' => 'profile'
    ], function ($router) {
        $router->get('me', "AuthController@me");
    });
});
