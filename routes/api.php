<?php

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

Route::get('/api/v1/customers', 'APIController@getCustomers')->name('api.customers.index');
Route::get('/api/v1/customers', 'APIController@getSets')->name('api.sets.index');
Route::get('/api/v1/customers', 'APIController@getMedias')->name('api.medias.index');
Route::get('/api/v1/customers', 'APIController@getLocations')->name('api.locations.index');

