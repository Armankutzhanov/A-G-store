<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


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
//
Route::get('/','App\Http\Controllers\HomeController@index')->name('home');

Route::get('/about','App\Http\Controllers\HomeController@about')->name('about');

Route::group(['middleware'=>'guest'],function (){
    Route::get('/register','App\Http\Controllers\UserController@create')->name('user.create');
    Route::post('/register','App\Http\Controllers\UserController@store')->name('user.store');

    Route::get('/login','App\Http\Controllers\UserController@loginForm')->name('login.create');
    Route::post('/login','App\Http\Controllers\UserController@login')->name('login');
});

Route::get('/logout','App\Http\Controllers\UserController@logout')->name('logout')->middleware('auth');

Route::fallback(function (){
     abort(404,'File not found');
});

//    Route::get('/admin','App\Http\Controllers\AdminController@index')->name('admin.page')->middleware('admin');
    Route::resource('/product','App\Http\Controllers\ProductController')->middleware('admin');

//Route::get('/basket', 'App\Http\Controllers\BasketController@index')->name('basket');
//Route::post('/basket', 'App\Http\Controllers\BasketController@addproduct')->name('add.product');
//Route::patch('cart/{cartItem}', 'App\Http\Controllers\CartController@update')->name('cart.update');
//Route::delete('cart/{cartItem}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');


Route::get('/basket', 'App\Http\Controllers\BasketController@index')->name('basket.index');
Route::get('/guest', 'App\Http\Controllers\BasketController@guest')->name('guest');
Route::post('/basket', 'App\Http\Controllers\BasketController@add')->name('basket.add');
Route::get('/topic', 'App\Http\Controllers\TopicController@index')->name('basket.show');
Route::post('/guest', 'App\Http\Controllers\BasketController@guestadd')->name('guest.add');
Route::get('/show','App\Http\Controllers\TopicController@show')->name('guest.show');
