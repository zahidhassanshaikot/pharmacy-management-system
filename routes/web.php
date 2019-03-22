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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:Super Admin|Admin|Employee'], function () {

Route::get('/', 'DeshboardController@index')->name('/');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/manage/stock', 'HomeController@index')->name('home');
});

});

Auth::routes();