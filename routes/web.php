<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/auth/redirect/{provider}', 'GoogleLoginController@redirect');
 Route::get('/callback/{provider}', 'GoogleLoginController@callback');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');

Route::get('/details/{id}', 'DetailController@index')->name('detail');
Route::post('/details/{id}', 'DetailController@addChart')->name('detail-add');


Route::get('/success', 'CartController@success')->name('success');


//checkout
Route::post('/checkout', 'CheckoutController@process')->name('checkout');
//callback
Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');



Route::get('/register/success','Auth\RegisterController@success')->name('register-success');


Route::group(['middleware'=>['auth']],function(){

    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');

    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/dashboard/products','DashboardProductController@index')->name('dashboard-product');
    Route::get('/dashboard/products/create','DashboardProductController@create')->name('dashboard-product-create');
    Route::get('/dashboard/products/{id}','DashboardProductController@details')->name('dashboard-product-details');
    Route::post('/dashboard/products/store','DashboardProductController@store')->name('dashboard-product-store');
    Route::post('/dashboard/products/{id}','DashboardProductController@update')->name('dashboard-product-update');

    Route::post('/dashboard/gallery/upload','DashboardProductController@uploadGallery')->name('dashboard-upload-gallery');
    Route::get('/dashboard/gallery/delete/{id}','DashboardProductController@deleteGallery')->name('dashboard-delete-gallery');


    Route::get('/dashboard/transactions','DashboardTransactionController@index')->name('dashboard-transaction');
    Route::get('/dashboard/transactions/detail/{id}','DashboardTransactionController@details')->name('dashboard-transaction-detail');
    Route::post('/dashboard/transactions/{id}','DashboardTransactionController@update')->name('dashboard-transactions-update');
    Route::get('/dashboard/settings','DashboardSettingController@store')->name('dashboard-setting-store');
    Route::get('/dashboard/account','DashboardSettingController@account')->name('dashboard-setting-account');
    //Route::get('/dashboard/account','DashboardSettingController@account')->name('dashboard-setting-account');

    Route::post('/dahboard/account/{redirect}','DashboardSettingController@update')->name('dashboard-setting-redirect');

});

Route::prefix('admin')->namespace('Admin')
        ->middleware(['auth','admin'])
        ->group(function(){
            Route::get('/','DashboardController@index')->name('admin-dashboard');
            Route::resource('category', 'CategoryController');
            Route::resource('user','UserController');
            Route::resource('produk','ProductController');
            Route::resource('gallery','GalleryController');
            Route::resource('transaction','TransactionController');
});
Auth::routes();


