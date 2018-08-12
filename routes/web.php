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

Route::any('/login','LoginController@index');
Route::get('/user/index','UserController@index');
Route::any('/user/add','UserController@addUser');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
