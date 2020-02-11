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

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/list', 'HomeController@all')->name('home.list');
Route::get('/home/setting', 'HomeController@setting')->name('setting');
Route::post('/home/change', 'HomeController@change')->name('change');

Route::get('/home/{id}/edit', 'HomeController@edit')->name('home.edit');
Route::put('/home/{id}', 'HomeController@update')->name('home.update');
Route::get('/home/{id}/{role}', 'HomeController@role')->name('home.update.role');
Route::get('/home/{id}/delete', 'HomeController@delete')->name('home.delete');


Route::get('/home/permissions','HomeController@showPermission')->name('home.permissions');
Route::post('/home/setpermissions','HomeController@setPermissions')->name('home.setpermissions');


Route::get('/task/add', 'TodoController@showaddtask')->name('task.showaddtask');
Route::post('/home/task', 'TodoController@store')->name('home.donetask');
Route::get('/home/task', 'TodoController@create')->name('home.task');

Route::post('/task/add','TodoController@addtask')->name('task.add');
Route::get('/task/manage','TodoController@managetask')->name('task.manage');
Route::get('/home/{userid}/{taskid}/delete', 'TodoController@destroy')->name('home.task.delete');
