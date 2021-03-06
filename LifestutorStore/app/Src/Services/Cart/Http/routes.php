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

/*Route::group(['prefix' => 'cart'], function() {
	Route::get('/', function() {
		dd('This is the Cart module index page.');
	});
});*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->post('carts', 'Services\Cart\Http\Controllers\CartController@store');
});

$api->version('v1', function ($api) {
    $api->put('carts', 'Services\Cart\Http\Controllers\CartController@addItem');
});