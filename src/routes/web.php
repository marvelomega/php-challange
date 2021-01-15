<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/people', 'PersonController@index')->name('person.index');
Route::post('/people/upload', 'PersonController@upload')->name('person.upload');

Route::get('/ship-order', 'ShipOrderController@index')->name('ship-order.index');
Route::post('ship-order/upload', 'ShipOrderController@upload')->name('ship-order.upload');
