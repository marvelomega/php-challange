<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/people', 'API\PersonController@index')->name('api.person.index');
Route::get('/person/{id}', 'API\PersonController@show')->name('api.person.show');

Route::get('/ship-order', 'API\ShipOrderController@index')->name('api.ship-order.index');
