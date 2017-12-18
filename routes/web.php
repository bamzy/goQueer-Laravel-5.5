<?php

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
    return view('home',['email' => 'James']);
})->name('simple');

Route::get('/', 'HomeController@index')->name('simple');
Route::get('/ajax', 'HomeController@ajax')->name('ajax');

//Route::get('/login', 'HomeController@showLogin')->name('login');
//Route::post('/login', 'HomeController@doLogin')->name('login');
//Route::get('/logout', 'HomeController@doLogout')->name('logout');


