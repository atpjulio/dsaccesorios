<?php

use App\Utilities;

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

Route::view('/work', 'work')->name('work');
Route::view('/contactus', 'contactus')->name('contactus');
Route::view('/who-are-we', 'who-are-we')->name('who.are.we');
Route::view('/terms-and-conditions', 'terms_and_conditions')->name('tac');
Route::post('/pay-cart', 'FrontEndController@payCart')->name('pay.cart');
Route::get('/product-detail/{id}', 'ProductController@show');
Route::get('/pay-cart-confirm', 'FrontEndController@payCartConfirm')->name('pay.cart.confirm');
Route::post('/pay-cart-process', 'FrontEndController@payCartProcess')->name('pay.cart.process');
Route::get('/cart', 'FrontEndController@cart')->name('cart');
Route::get('/', 'FrontEndController@welcome')->name('welcome');
Route::get('/store/{id?}', 'FrontEndController@store')->name('store');
Route::get('/store/{id}/more', 'FrontEndController@more')->name('more');
Route::post('/subscribe', 'FrontEndController@subscribe')->name('subscribe');
Route::get('/empty-cart', 'FrontEndController@emptyCart')->name('empty.cart');
Route::match(['post', 'get'],'/add-to-cart', 'FrontEndController@addToCart')->name('add.to.cart');
Route::get('/substract-from-cart', 'FrontEndController@substractFromCart')->name('substract.from.cart');

Route::middleware(['auth', 'admin'])->group(function () {
	Route::resource('products', 'ProductController');
  Route::get('/products-delete/{id}', 'ProductController@delete')->name('products.delete');
	Route::get('/products-solds', 'ProductController@solds')->name('products.solds');
	Route::get('/products-likes', 'ProductController@likes')->name('products.likes');

  Route::get('/user/delete/{id}', 'UserController@delete')->name('user.delete');
  Route::resource('users', 'UserController');
	Route::resource('slider', 'SliderController');
  Route::resource('category', 'CategoryController');
  Route::resource('bulletin', 'BulletinController');
	Route::get('/bulletin-delete/{id}', 'BulletinController@delete')->name('bulletin.delete');

	Route::get('/subscriptions', 'SubscriptionController@index')->name('subscription.index');
  Route::get('/subscriptions/create', 'SubscriptionController@create')->name('subscription.create');
	Route::get('/subscriptions/unsubscribe/{id}', 'SubscriptionController@unsubscribe')->name('subscription.unsubscribe');

  Route::get('/subscriber-activate/{id}', 'SubscriptionController@activate')->name('subscriber.activate');
  Route::patch('/subscriber-activate-process/{subscriber}', 'SubscriptionController@activateProcess')->name('subscriber.activate.process');
  Route::get('/subscriber-deactivate/{id}', 'SubscriptionController@deactivate')->name('subscriber.deactivate');
  Route::patch('/subscriber-deactivate-process/{subscriber}', 'SubscriptionController@deactivateProcess')->name('subscriber.deactivate.process');
	Route::get('/subscriber-delete/{id}', 'SubscriptionController@delete')->name('subscriber.delete');
	Route::delete('/subscriber-destroy/{id}', 'SubscriptionController@destroy')->name('subscriber.destroy');
});

Route::middleware(['auth', 'both'])->group(function () {
  	Route::resource('orders', 'OrderController');
    Route::get('my-order/{id}', 'OrderController@show')->name('my.order');
  	Route::get('my-orders', 'OrderController@myOrders')->name('my.orders');
  	Route::get('my-profile', 'HomeController@myProfile')->name('my.profile');
  	Route::post('update-profile', 'HomeController@updateProfile')->name('update.profile');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/set-to-cart', 'AjaxController@setToCart')->name('set.to.cart');
