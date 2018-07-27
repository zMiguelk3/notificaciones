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

Route::view('/', 'welcome');
Route::get('admin', 'HomeController@index')->name('admin.index');

Auth::routes();

Route::get('mensajes', 'Admin\MessageController@create')->name('mensajes.create');
Route::post('mensajes', 'Admin\MessageController@store')->name('mensajes.store');
Route::get('mensajes/{id}', 'Admin\MessageController@show')->name('mensajes.show');

Route::get('notificaciones', 'Admin\NotificationsController@index')->name('notificaciones.index');
Route::put('notificaciones/{id}', 'Admin\NotificationsController@update')->name('notificaciones.update');
Route::delete('notificaciones/{id}', 'Admin\NotificationsController@destroy')->name('notificaciones.destroy');


