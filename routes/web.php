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

Route::get('/', 'FrontProductListController@index');
Route::get('/product/{id}', 'FrontProductListController@show')->name('product.show');
Route::get('/category/{name}', 'FrontProductListController@allProduct')->name('product.list');


Auth::routes();

Route::get('all/products', 'FrontProductListController@moreProducts')->name('more.product');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'auth', 'middleware' => ['auth','isAdmin']], function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('category', 'CategoryController');
    Route::resource('subcategory', 'SubCategoryController');
    Route::resource('product', 'ProductController');
    Route::get('subcategories/{id}','ProductController@loadSubcategories');
    Route::get('slider', 'SliderController@index')->name('slider.index');
    Route::get('slider/create', 'SliderController@create')->name('slider.create');
    Route::post('slider', 'SliderController@store')->name('slider.store');
    Route::delete('slider/{id}', 'SliderController@destroy')->name('slider.destroy');
});

Route::get('/addToCart/{product}', 'CartController@addToCart')->name('add.cart');
Route::get('/cart', 'CartController@showCart')->name('cart.show');
Route::post('/products/{product}', 'CartController@updateCart')->name('update.cart');
Route::post('/product/{product}', 'CartController@removeCart')->name('remove.cart');

Route::get('/checkout/{amount}','CartController@checkout')
->name('checkout.cart')->middleware('auth');

Route::post('/charge','CartController@charge')->name('charge.cart');
Route::get('/orders', 'CartController@order')->name('order')->middleware('auth');


