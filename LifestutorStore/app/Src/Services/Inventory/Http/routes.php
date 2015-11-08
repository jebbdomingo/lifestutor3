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

/*Route::group(['prefix' => 'inventory'], function() {
    Route::get('/', function() {
        dd('This is the Inventory module index page.');
    });
});*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('items', 'Services\Inventory\Http\Controllers\ItemController@index');
    
    $api->get('items/{id}', 'Services\Inventory\Http\Controllers\ItemController@show');

    $api->post('items', [
        'middleware' => 'api.auth',
        'uses'       => 'Services\Inventory\Http\Controllers\ItemController@store'
    ]);
});