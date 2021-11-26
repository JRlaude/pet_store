<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', 'ProductController@getProducts')->name('products');
Route::get('/pets', 'PetController@getPets')->name('pets');
Route::get('/posts', 'PostController@getPosts')->name('posts'); 
Route::get('/about', function () {
    return view('about');
});  

Route::resource('/users', 'UserController');
Route::get('/profile', 'UserController@profile')->name('profile');

Route::resource('/carts', 'CartController');
Route::resource('/orders', 'OrderController');
Route::resource('/orderDetails', 'OrderDetailsController');
Route::resource('/reservations', 'ReservationController');
Route::resource('/shippingAddresses', 'ShippingAddressController');
Route::resource('/posts', 'PostController');
Route::resource('/hearts', 'HeartController');
Route::resource('/comments', 'CommentController');
Route::resource('/messages', 'MessageController');

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () { 
        Route::get('/', 'AdminController@index')->name('admin.index'); 
        Route::get('/dashboard', 'AdminController@index')->name('dashboard');


        Route::resource('/category', 'CategoryController');
        Route::resource('/products', 'ProductController');
        Route::resource('/petCategories', 'PetCategoryController');
        Route::resource('/pets', 'PetController');
        Route::resource('/orders', 'OrderController');
    });
});

