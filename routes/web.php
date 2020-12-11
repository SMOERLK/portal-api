<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->group(['prefix' => 'api'], function () use ($router) {
    // Matches "/api/register
    $router->post('login', 'AuthController@login');
    $router->put('refresh', 'AuthController@refresh');
    $router->get('profile', 'UserController@profile');

    $router->get('students', 'StudentsController@list');
    $router->post('students/{id}', 'StudentsController@update');

    $router->get('institutions','InstitutionsController@list');
    $router->post('institutions/{id}', 'InstitutionsController@update');
    
 });
