<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function (Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

        $api->post('logout', 'App\\Api\\V1\\Controllers\\LogoutController@logout');
        $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
    });

    $api->group(['middleware' => 'jwt.auth'], function (Router $api) {
        $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');
        $api->get('actions', 'App\\Api\\V1\\Controllers\\ActionController@get');

        $api->get('events', 'App\\Api\\V1\\Controllers\\EventController@get');
        $api->post('event', 'App\\Api\\V1\\Controllers\\EventController@create');
        $api->post('event/{$id}', 'App\\Api\\V1\\Controllers\\EventController@update');
    });
});
