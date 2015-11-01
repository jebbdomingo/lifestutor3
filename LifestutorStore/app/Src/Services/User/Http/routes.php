<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::group(['prefix' => 'store/v1'], function() {
	Route::get('/', function() {
		dd('This is the User service index page.');
	});

	Route::resource('user', 'UserController');
});*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->post('users', [
    	'middleware' => 'api.auth',
    	'uses'       => 'Services\User\Http\Controllers\UserController@store'
    ]);

    $api->get('users/{id}', [
    	'middleware' => 'api.auth',
    	'uses'       => 'Services\User\Http\Controllers\UserController@show'
    ]);

    $api->get('users', [
    	'middleware' => 'api.auth',
    	'uses'       => 'Services\User\Http\Controllers\UserController@index'
    ]);
});