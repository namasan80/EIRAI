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

Route::get('/', 'IndexController@index');
Route::get('/home', 'HomeController@index')->name('home');

//Users
Route::get('/users', 'UserController@index');
Route::get('/users/edit', 'UserController@edit');
Route::get('/users/{user}', 'UserController@show');
Route::put('/users/{user}', 'UserController@update');

//Samples
Route::get('/samples', 'SampleController@index');
Route::get('/samples/create', 'SampleController@create');
Route::get('/samples/{sample}', 'SampleController@show');
Route::post('/samples', 'SampleController@store');