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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'FrontEndController@welcome')->name('welcome');
Route::get('/who-are-we', 'FrontEndController@whoAreWe')->name('who.are.we');
Route::get('/contactus', 'FrontEndController@contactUs')->name('contactus');
Route::get('/store/{id?}', 'FrontEndController@store')->name('store');
Route::get('/store/{id}/more', 'FrontEndController@more')->name('more');
Route::get('/cart', 'FrontEndController@cart')->name('cart');
Route::get('/terms-and-conditions', 'FrontEndController@termsAndConditions')->name('tac');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', 'ProductController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
