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
    return redirect('/login');
});

Auth::routes();

Route::get('/redirect', 'Auth\LoginController@redirectToProvider')->name('redirect');

Route::get('/callback', 'Auth\LoginController@handleProviderCallback')->name('callback');;

Route::get('/home', 'HomeController@userHome')->name('home');

Route::get('/currency', 'CurrencyController@index')->name('currency');

Route::post('/currency', 'CurrencyController@buy')->name('buyCurrency');

Route::get('/profile', 'UserController@viewProfile')->name('viewProfile');

Route::post('/profile', 'UserController@updateProfile')->name('updateProfile');

Route::get('/rates', 'RatesController@viewRates')->name('viewRates');

Route::post('/rates', 'RatesController@updateRates')->name('updateRates');

Route::get('/viewPhotos', 'MediaController@viewPhotos')->name('viewPhotos');

Route::get('/viewVideos', 'MediaController@viewVideos')->name('viewVideos');

Route::get('/addPhoto', 'MediaController@viewAddPhoto')->name('viewAddPhoto');

Route::post('/addPhoto', 'MediaController@addPhoto')->name('addPhoto');

Route::get('/addVideo', 'MediaController@viewAddVideo')->name('viewAddVideo');

Route::post('/addVideo', 'MediaController@addVideo')->name('addVideo');

Route::get('/addMerchandise', 'MerchandiseController@viewAddMerchandise')->name('viewAddMerchandise');

Route::post('/addMerchandise', 'MerchandiseController@addMerchandise')->name('addMerchandise');

Route::get('/viewMerchandise', 'MerchandiseController@viewMerchandise')->name('viewMerchandise');

Route::get('/manageUsers', 'UserController@viewUsers')->name('manageUsers');

Route::post('/verifyUser', 'UserController@verifyUser')->name('verifyUser');

