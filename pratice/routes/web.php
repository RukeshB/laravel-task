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

Route::get('/user', 'UserController@index');

Route::get('/user/signup', 'UserController@create')->name('user.create');
Route::post('/user', 'UserController@store');
Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
Route::put('/user/{id}', 'UserController@update')->name('user.update');
Route::get('/user/{id}/delete', 'UserController@delete')->name('user.delete');

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/list', 'HomeController@all')->name('home.list');
Route::get('/home/setting', 'HomeController@setting')->name('setting');
Route::post('/home/change', 'HomeController@change')->name('change');

Route::get('/home/{id}/edit', 'HomeController@edit')->name('home.edit');
Route::put('/home/{id}', 'HomeController@update')->name('home.update');
Route::get('/home/{id}/delete', 'HomeController@delete')->name('home.delete');
