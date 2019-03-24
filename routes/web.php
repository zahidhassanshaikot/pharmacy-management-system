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
        Route::get('/manage/stock', 'ManageStockController@manageStock')->name('manage-stock');
        Route::post('/add/product', 'ManageStockController@addProduct')->name('add-product');

        Route::get('/unpublished-product/{id}', 'ManageStockController@unpublishedProduct')->name('unpublished-product');
        Route::get('/published-product/{id}', 'ManageStockController@publishedProduct')->name('published-product');
        Route::get('/delete-product/{id}', 'ManageStockController@deleteProduct')->name('delete-product');

        Route::get('/admin/product/edit/{id}', 'ManageStockController@editProduct')->name('edit-product');
        Route::post('/admin/product/update', 'ManageStockController@updateProduct')->name('update-product');
    });

});

Auth::routes();
