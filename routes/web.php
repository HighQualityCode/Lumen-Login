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


$router->group(['prefix' => 'api/'], function ($router) {
	$router->get('/login', 'controller@index');
	$router->post('/login', 'UsersController@authenticate');
	$router->post('/register', 'UsersController@register');
});

$router->get('/', function () use ($router) {
    return redirect('/api/login');
});