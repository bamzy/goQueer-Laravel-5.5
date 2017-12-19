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

Route::get('/login', 'HomeController@showLogin')->name('login');
//Route::post('/login', 'HomeController@doLogin')->name('login');
//Route::get('/logout', 'HomeController@doLogout')->name('logout');


Route::get('/documentation', function () {
    return view('document.index')->with('email',Auth::user()->email);
});

Route::get('/features', function () {
    return view('feature.index')->with('email',Auth::user()->email);
});

Route::get('/register', function () {
    return view('auth.register');
});
Route::resource('order', 'OrderController');
//Route::resource('location','LocationController');
Route::resource('location', 'LocationController', ['except' => ['destroy']]);
Route::get('location/{id}/destroy','LocationController@destroy');
Route::resource('draft','DraftController');
//Route::resource('media','MediaController');
Route::resource('media', 'MediaController', ['except' => ['destroy']]);
Route::get('media/{id}/destroy','MediaController@destroy');
Route::resource('gallery','GalleryController');
Route::resource('message','MessageController');
Route::resource('gallery_media','GalleryMediaController');
Route::resource('test','TestController');
Route::resource('final','FinalController');
Route::resource('map','MapController');
//Route::resource('set','SetController');
Route::resource('set', 'SetController', ['except' => ['destroy']]);
Route::get('set/{id}/destroy','SetController@destroy');
Route::resource('profile','ProfileController');
Route::resource('hint','HintController');
Route::auth();