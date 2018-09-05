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

Route::get('/', 'HomeController@index')->name('index');


Auth::routes();

Route::get('/ville/{ville}','PicturesController@index')->name('pictures.index');

/**
 * DASHBOARD
 */
Route::get('/dashboard'                 ,'DashboardController@index')->name('home');

Route::get('dashboard/city/create'      ,'CityController@getFormCity')->name('city.form');
Route::post('dashboard/city/create'     ,'CityController@createCity')->name('city.submit');

Route::get('dashboard/post/create'      ,'DashboardController@getFormPost')->name('post.form');
Route::post('dashboard/post/create'     ,'DashboardController@createPost')->name('post.submit');

Route::delete('dashboard/city/{city}/delete' ,['uses'=>'CityController@delete','as'=>'city.delete']);

Route::get('dashboard/city/{city}/edit' ,['uses'=>'CityController@edit','as'=>'city.edit']);
Route::post('dashboard/city/{city}/edit' ,['uses'=>'CityController@update','as'=>'city.edit']);