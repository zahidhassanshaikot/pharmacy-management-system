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

        //stock
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/manage/stock', 'ManageStockController@manageStock')->name('manage-stock');
        Route::post('/add/product', 'ManageStockController@addProduct')->name('add-product');

        Route::get('/unpublished-product/{id}', 'ManageStockController@unpublishedProduct')->name('unpublished-product');
        Route::get('/published-product/{id}', 'ManageStockController@publishedProduct')->name('published-product');
        Route::get('/delete-product/{id}', 'ManageStockController@deleteProduct')->name('delete-product');

        Route::get('/admin/product/edit/{id}', 'ManageStockController@editProduct')->name('edit-product');
        Route::post('/admin/product/update', 'ManageStockController@updateProduct')->name('update-product');


        //product
        Route::get('/sale-product/{id}', 'ProductSaleController@saleProduct')->name('sale-product');
        Route::get('/get-product-cost/{id}', 'ProductSaleController@getProductCost')->name('get-product-cost');
        Route::get('/customer/view', 'ProductSaleController@customerViewPage')->name('customer-view');

        //card
        Route::post('/add-to-cart', 'CartController@addToCart')->name('add-to-cart');
        Route::get('/delete-cart-item/{id}', 'CartController@removeFromCart')->name('delete-cart-item');
        Route::get('/remove-all-cart', 'CartController@removeAllFromCart')->name('remove-all-cart');
        Route::get('/checkout/{id}', 'CartController@checkout')->name('checkout');

        //customer
        Route::get('/add/customer', 'CustomerController@customerAdd')->name('add-customer');
        Route::post('/save/customer', 'CustomerController@saveCostomerInfo')->name('add-customer-info');
        Route::get('/customer/list', 'CustomerController@customerList')->name('customer-list');


    });

});

Auth::routes();
