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

     Route::post('/password-request', 'UserController@resetPassword')->name('password-request');



Route::group(['middleware' => ['auth', 'verified:ture']], function () {
    Route::group(['middleware' => 'role:Super Admin|Admin|Manager|Sells Man'], function () {

        Route::get('/', 'DeshboardController@index')->name('/');

        //User
        Route::get('admin/user-list', 'UserController@userList')->name('view-user-list');
        Route::get('admin/all-user/list/{role}', 'UserController@viewUserListByRole')->name('all-user-list');
        Route::post('admin/registration/new-user', 'UserController@addNewUser')->name('register-new-user');
        Route::post('/update-admin/profile', 'UserController@updateAdminProfile')->name('update-admin-profile');
        Route::get('admin/my-profile', 'UserController@myProfile')->name('my-profile');
        Route::get('admin/my-profile/edit', 'UserController@myProfileEdit')->name('edit-admin-profile');
        Route::get('admin/password-change', 'UserController@changePassword')->name('password-change');
        Route::post('admin/update-password', 'UserController@updatePassword')->name('update-password');

        Route::post('/super-admin/change/role', 'UserController@changeUserRole')->name('change-user-role-by-SAdmin');
        Route::post('/super-admin/change/Password', 'UserController@changeUserPasswordBySadmin')->name('change-user-password-by-SAdmin');
        Route::get('/super-admin/delete/user/{id}', 'UserController@deleteUserBySuperAdmin')->name('delete-user-by-SAdmin');

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
        

        //card
        Route::post('/add-to-cart', 'CartController@addToCart')->name('add-to-cart');
        Route::get('/delete-cart-item/{id}', 'CartController@removeFromCart')->name('delete-cart-item');
        Route::get('/remove-all-cart', 'CartController@removeAllFromCart')->name('remove-all-cart');
        Route::get('/checkout/{id}', 'CartController@checkout')->name('checkout');
        Route::post('/invoice', 'CartController@invoice')->name('invoice');

        //customer
        Route::get('/add/customer', 'CustomerController@customerAdd')->name('add-customer');
        Route::post('/save/customer', 'CustomerController@saveCostomerInfo')->name('add-customer-info');
        Route::get('/customer/list', 'CustomerController@customerList')->name('customer-list');

        //report
        Route::get('/most-sale-product','ReportController@mostSaleProduct')->name('most-sale-product');
        Route::get('/full-course-not-taken','ReportController@fullCourseNotTaken')->name('did-not-take-full-course');
        Route::get('/details-full-course/{id}','ReportController@detailsFullCourseNotTaken')->name('details-full-course');


    });

});
Route::get('/customer/view', 'ProductSaleController@customerViewPage')->name('customer-view');
Auth::routes(['verify' => true]);
// Auth::routes();
