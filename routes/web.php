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

Route::get('/','UserController@create');
Route::post('/','UserController@store');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show', 'UserController@show');
Route::get('articles/delete', 'ArticleController@delete');