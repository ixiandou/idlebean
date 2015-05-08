<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('user', 'UserController');
Route::resource('worker', 'WorkerController');
Route::resource('order', 'OrderController');
Route::resource('test', 'TestController');

Route::get('user/reg/{mobile}', 'UserController@reg');
Route::get('user/confirm/{mobile}/{code}', 'UserController@confirm');
Route::get('user/check/{mobile}/{token}', 'UserController@check');
