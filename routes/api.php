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
        $router->get('me', [
            'as' => 'profile', 'uses' => "AuthController@me"    // create name => route('profile')
        ]);
    });

    // Post 
    $router->group([
        'middleware' => 'api',
        'prefix' => 'post'
    ], function ($router) {
        $router->get('', "PostController@all");
        $router->post('', 'PostController@store');
        $router->put('{id}', "PostController@update");
        $router->get('{id}', "PostController@get_by_id");
        $router->delete('{id}', "PostController@delete");
    });
});
