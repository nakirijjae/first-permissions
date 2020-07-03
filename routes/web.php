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

Route::get('/', function () { return view('welcome'); });
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/products', 'ProductController@index')->name('list_products');
Route::get('/products/create', 'ProductController@create')->name('new_product')->middleware('auth');
Route::post('/products/create', 'ProductController@store')->name('create_product')->middleware('auth');
Route::get('/products/{id}/view', 'ProductController@show');
Route::get('/products/{id}/edit', 'ProductController@edit')->middleware('auth');
Route::put('/products/{id}/update', 'ProductController@update')->middleware(['auth']);
Route::delete('/products/{id}/delete', 'ProductController@destroy')->middleware(['auth']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
