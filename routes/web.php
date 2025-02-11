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
Route::get('/products/{id}', 'ProductController@getProduct')->name('product');
Route::get('/products/category/{id}', 'ProductController@getProductByCategory')->name('productByCategory');
Route::post('/search/product', 'ProductController@searchProduct')->name('searchProduct');


Route::get('/pets', 'PetController@getPets')->name('pets');
Route::get('/posts', 'PostController@getPosts')->name('posts');
Route::get('/about', function () {
    return view('about');
});

Route::resource('/users', 'UserController');
Route::get('{user}/profile', 'UserController@profile')->name('profile');

Route::resource('/carts', 'CartController');
Route::resource('/orders', 'OrderController');
Route::get('/buynow/{product}', 'OrderController@buynow')->name('buynow');
Route::get('/cancel', 'OrderController@cancelOrder')->name('orders.cancel');

Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('/checkout', 'CheckoutController@store')->name('checkout');

// Route::resource('/orderDetails', 'OrderDetailsController');
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

        Route::get('/users', 'UserController@index');
        Route::get('/orders', 'OrderController@index');
        Route::get('/reservations', 'ReservationController@index');

        Route::resource('/category', 'CategoryController');
        Route::resource('/products', 'ProductController');
        Route::resource('/pet_categories', 'PetCategoryController');
        Route::resource('/pets', 'PetController');
    });
});

    // Carts
    Route::get('/carts', 'CartController@index')->name('carts.index');
    Route::get('/add-to-cart/{product:id}', 'CartController@add')->name('carts.add');
    Route::get('/remove/{product:id}', 'CartController@remove')->name('carts.remove');
    Route::get('/remove-to-cart/{product:id}', 'CartController@destroy')->name('carts.destroy');
    Route::put('/carts/update/{product:id}', 'CartController@update')->name('carts.update');
