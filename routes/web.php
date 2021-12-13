<?php

/*
|--------------------------------------------------------------------------
| Web Routes
:--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */


Auth::routes();

Route::get('/', function () {
		    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'cart'], function() {
	Route::get('index', 'Cart\CartController@index')->name('cart.index');
	Route::post('', 'Cart\CartController@delete')->name('cart.delete');
	Route::post('index', 'Cart\CartController@add')->name('cart.add');
});


Route::group(['prefix' => 'item'], function(){
	Route::get('index', 'Item\ItemController@index')->name('item.index');
	Route::get('detail', 'Item\ItemController@detail')->name('item.detail');
});


Route::group(['prefix' => 'admin'], function(){
	Route::get('home', 'Admin\HomeController@index')->name('admin.home');
	Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
	Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

	Route::group(['prefix' => 'item'], function(){
		Route::get('index', 'Admin\Item\ItemController@index')->name('admin.item.index');
		Route::get('detail', 'Admin\Item\ItemController@detail')->name('admin.item.detail');
		Route::get('register', 'Admin\Item\\RegisterController@showRegisterForm')->name('admin.item.register');
		Route::post('register', 'Admin\Item\RegisterController@register')->name('admin.item.register');
		Route::get('edit', 'Admin\Item\EditController@showEditForm')->name('admin.item.edit');
		Route::post('edit', 'Admin\Item\EditController@edit')->name('admin.item.edit');
	});
});

/*
Route::group(['prefix' => 'cart'], function(){
	Route::get('home', 'HomeController@index')->name('carts.home');
});

