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
Route::resource('order', 'OrderController');
Route::resource('photo', 'PhotoController');
Route::resource('test', 'TestController');

Route::get('token/{mobile}', ['as' => 'token.request', 'uses' => 'TokenController@fetch']);
Route::get('token/{mobile}/{code}', ['as' => 'token.confirm', 'uses' => 'TokenController@confirm']);
Route::get('token/check/{mobile}/{code}', ['as' => 'token.check', 'uses' => 'TokenController@check']);
Route::get('bonus/add/{user}/{bonus}', ['bonus.add', 'uses' => 'BonusController@add']);
Route::get('bonus/cost/{user}/{bonus}', ['bonus.add', 'uses' => 'BonusController@cost']);
Route::get('comment/add/{user}/{level}', ['comment.add', 'uses' => 'CommentController@add']);

