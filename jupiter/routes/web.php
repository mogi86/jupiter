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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//書籍API関連
Route::group(['prefix' => 'api/book'], function () {
    Route::get('/get', 'BookApiController@get');
    Route::get('/show', 'BookApiController@show');
    Route::post('/store', 'BookApiController@store');
});


Route::group(['prefix' => 'user', 'as' => 'user::'], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/create/', 'UserController@create')->name('create');
    Route::post('/store/', 'UserController@store')->name('store');
});