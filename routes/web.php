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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');


Route::group(['middleware' => 'auth'], function(){
Route::get('/dashboard', 'DashboardController@index');
Route::get('/art', 'ArtController@index');
Route::post('/art/create','ArtController@create');
Route::get('/art/{id}/editw', 'ArtController@editw');
Route::post('/art/{id}/update', 'ArtController@update');
Route::get('/notfound', 'notfoundController@notfound');
Route::get('art/profile/{id}','ArtController@profile');
});