<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('/api/v1/signup', 'UsersController@signup');
$router->post('/api/v1/signin', 'UsersController@signin');

$router->get('/', function () use ($router) {
  return $router->app->version();
});

