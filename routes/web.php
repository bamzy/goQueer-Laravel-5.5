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
Route::get('/home', 'HomeController@index');
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
//Route::resource('draft','DraftController');
Route::resource('draft', 'DraftController', ['except' => ['destroy']]);
Route::get('draft/{id}/destroy','DraftController@destroy');
//Route::resource('media','MediaController');
Route::resource('media', 'MediaController', ['except' => ['destroy','update']]);
Route::get('media/{id}/destroy','MediaController@destroy');
//Route::resource('gallery','GalleryController');
Route::resource('gallery', 'GalleryController', ['except' => ['destroy']]);
Route::get('gallery/{id}/destroy','GalleryController@destroy');
Route::resource('message','MessageController');
Route::resource('gallery_media','GalleryMediaController');
Route::resource('final','FinalController');
Route::resource('test','TestController');
Route::resource('map','MapController');
//Route::resource('set','SetController');
Route::resource('set', 'SetController', ['except' => ['destroy']]);
Route::get('set/{id}/destroy','SetController@destroy');
//Route::resource('profile','ProfileController');
Route::resource('profile', 'ProfileController', ['except' => ['destroy']]);
Route::get('profile/{id}/destroy','ProfileController@destroy');
Route::resource('hint','HintController');
Route::auth();



Route::get('/client/getAllLocations', array('uses' => 'PlayerController@getAllLocations'));
Route::get('/client/getMyLocations', array('uses' => 'PlayerController@getMyLocations'));
Route::get('/client/downloadMediaById', array('uses' => 'PlayerController@downloadMediaById'));
Route::get('/client/getGalleryMediaById', array('uses' => 'PlayerController@getMediaByGalleryId'));
Route::get('/client/getMediaById', array('uses' => 'PlayerController@getMediaById'));
Route::get('/client/getGalleryById', array('uses' => 'PlayerController@getGalleryById'));
Route::get('/client/setDiscoveryStatus', array('uses' => 'PlayerController@updateDiscoveryStatus'));
Route::get('/client/getHint', array('uses' => 'PlayerController@getHint'));
Route::get('/client/getSetStatusSummary', array('uses' => 'PlayerController@getSetStatusSummary'));
Route::get('/client/getAllProfiles', array('uses' => 'ProfileController@getAllExceptDraft'));
//Route::get('/client/test', array('uses' => 'ProjectController@getDatatable'));
Route::post('image-upload',['as'=>'image.upload.post','uses'=>'MediaController@imageUploadPost']);
Route::post('media-update',['as'=>'media.update','uses'=>'MediaController@update']);