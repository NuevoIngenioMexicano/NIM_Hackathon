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

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->get('/api/v2/login', function () use ($app) {
    return "Hola Lumen";
});

$app->group(['prefix' => '/api/v1', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    $app->post('/login','ClienteController@login');
    $app->post('/signup','ClienteController@signup');
    $app->post('/trabajos','TrabajoController@postTrabajos');
    $app->put('/trabajos/{id}','TrabajoController@updateTrabajo');
    $app->get('/trabajos','TrabajoController@getTrabajos');
    $app->get('/publicados/{id}','ClienteController@getTrabajos');

    // $app->post('/trabajor/login','TrabajadorController@login');
    $app->post('/trabajador/signup','TrabajadorController@signup');
    $app->post('/trabajador/review', 'TrabajadorController@reviewTrabajador');
    $app->post('/searchCandidatos', 'TrabajadorController@searchTrabajadores');
});