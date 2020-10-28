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
Route::post('/art/create','AdminController@create');
Route::get('/art/edit/{id}', 'AdminController@edit');
Route::post('/art/{id}/update', 'AdminController@update');
Route::get('/notfound', 'notfoundController@notfound');
Route::get('art/profile/{id}','AdminController@profile');
Route::get('/profilku/{id}','AdminController@profilku');
});

//art
Route::group(['middleware' => ['auth', 'checkrole: art']], function(){
Route::get('/maid', 'ArtController@maid');
});

//master
Route::group(['middleware' => ['auth', 'checkrole:master']], function(){
Route::get('/master', 'MasterController@master');
});