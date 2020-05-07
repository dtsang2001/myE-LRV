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

// Group Routes Customer
Route::group(['prefix'=>'', 'namespace'=>'Customer'], function()
{
	// Route Home
	Route::get('/', 'HomeController@index')->name('home');

	// Route Contact
	Route::get('contact', 'HomeController@contact')->name('contact');

	// Route About
	Route::get('about', 'HomeController@about')->name('about');

	// Route Product
	Route::get('/product', 'ProductController@list')->name('product_fe');
	Route::get('//{slug}.html', 'ProductController@view')->name('view_product_fe');

	// Route Comment Product
	Route::post('/ajaxComment', 'ProductController@ajaxComment');

	// Route Account
	Route::group(['prefix'=>'account', 'middleware'=>'myauth'], function()
	{
		Route::get('/', 'AccountController@view')->name('account');
	});

	// Route Order
	Route::group(['prefix'=>'order'], function()
	{
		Route::get('/', 'OrderController@order')->name('order');
		Route::post('/', 'OrderController@post_order')->name('order');

		Route::get('/notification', 'OrderController@notification')->name('order_notification');

		Route::get('/history', 'OrderController@history')->name('order_history');
		Route::get('/detail/{id}', 'OrderController@detail')->name('order_detail');
	});

	// Route Cart
	Route::group(['prefix'=>'cart'], function()
	{
		Route::get('/view', 'CartController@view')->name('cart');
		Route::get('/add/{id}', 'CartController@add_cart')->name('add-cart');
		Route::get('/delete/{id}', 'CartController@delete_cart')->name('delete-cart');
		Route::get('/update/{id}', 'CartController@update_cart')->name('update-cart');
		Route::get('/clear', 'CartController@clear_cart')->name('clear-cart');
	});

	// Route Login - Logout
	Route::get('/account/login', 'HomeController@login')->name('login_fe');
	Route::post('/account/login', 'HomeController@post_login')->name('post_login_fe');
	Route::post('/account/register', 'HomeController@post_register')->name('post_register_fe');
	Route::get('/account/logout', 'HomeController@logout')->name('logout_fe');
});

// Group Routes Admin
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'guest'], function()
{
	// Route Admin
	Route::get('/', 'DashboardController@index')->name('admin');

	// Routes Category
	include('admin/routeCategory.php');

	// Routes Product
	include('admin/routeProduct.php');

	// Routes Category News
	include('admin/routeCategoryNews.php');

	// Routes News
	include('admin/routeNews.php');

	// Route User
	include('admin/routeUser.php');

	// Route Bill
	Route::get('/bill', 'BillController@list')->name('bill');

	// Route Role
	Route::get('/role', 'RoleController@list')->name('role');
	Route::get('/role-admin/{id}', 'RoleController@update_admin')->name('role-admin');
});

Route::get('/admin/login', 'Admin\DashboardController@login')->name('login');
Route::post('/admin/login', 'Admin\DashboardController@post_login')->name('login');
Route::get('/admin/logout', 'Admin\DashboardController@logout')->name('logout');
