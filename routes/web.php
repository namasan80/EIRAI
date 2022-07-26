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
Route::group(['middleware' => ['auth']], function(){
    Route::get('/users/edit', 'UserController@edit');
    Route::put('/users/{user}', 'UserController@update');
});
Route::get('/users/{user}', 'UserController@show');

//Samples
Route::get('/samples', 'SampleController@index');
Route::group(['middleware' => ['auth']], function(){
    Route::get('/samples/create', 'SampleController@create');
    Route::post('/samples', 'SampleController@store');
    Route::get('/samples/edit/{sample}', 'SampleController@edit');
    Route::put('/samples/{sample}', 'SampleController@update');
});
Route::get('/samples/{sample}', 'SampleController@show');

//Requests
Route::get('/requests', 'ReqController@index');
Route::group(['middleware' => ['auth']], function(){
    Route::get('/requests/create', 'ReqController@create');
    Route::post('/requests', 'ReqController@store');
    Route::post('/requests/offer', 'ReqController@offer');
});
Route::get('/requests/{req}', 'ReqController@show');

//いいね
Route::group(['middleware' => ['auth']], function(){
    Route::post('/good/{sampleId}','GoodController@store');
});

//フォロー
Route::group(['middleware' => ['auth']], function(){
    Route::post('/follow/{userId}','FollowUserController@follow');
});