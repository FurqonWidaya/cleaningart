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
    return view('index');
});
//Auth::Routes();
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/admin/register', 'AuthController@adminregister');
Route::post('/postregister', 'AuthController@postregister');
Route::get('/register', 'AuthController@register');
Route::post('/postregis', 'AuthController@postregis');


//ADMIN
Route::group(['middleware' => ['auth', 'checkrole:admin']], function(){
Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/dataart', 'AdminController@dataart');
Route::get('/datamaster', 'AdminController@datamaster');
Route::post('/dataart/create','AdminController@create');
Route::get('/art/edit/{id}', 'AdminController@edit');
Route::get('/edit/{id}', 'AdminController@editadmin');
Route::post('/art/{id}/update', 'AdminController@update');
Route::post('/admin/{id}/update', 'AdminController@updateadmin');
Route::get('/notfound', 'notfoundController@notfound');
Route::get('art/profile/{id}','AdminController@profilart');
Route::get('master/profile/{id}','AdminController@profilmaster');
Route::get('dataku/{id}','AdminController@profiladmin');
});

//art
Route::group(['middleware' => ['auth', 'checkrole: art']], function(){
Route::get('/homes', 'ArtController@maid');
Route::get('/errors', 'ArtController@error');
});

//master
Route::group(['middleware' => ['auth', 'checkrole:master']], function(){
Route::get('/home', 'MasterController@master');
Route::get('/error', 'MasterController@error');
});