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

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::middleware("auth")
    ->namespace("Admin")
    ->name("admin.")
    ->prefix("admin")
    ->group(function () {
        Route::get('/', 'OrderController@index')->name('orders.home');
        Route::get('/create', 'OrderController@create')->name('orders.create');
        Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
        Route::resource("dishes", "DishController");
    });
