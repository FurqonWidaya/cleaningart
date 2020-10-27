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
Route::get('/register', 'AuthController@register');
Route::post('/postregister', 'AuthController@postregister');


//ADMIN
Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/art', 'AdminController@dataart');
Route::post('/art/create','AdminController@create');
Route::get('/art/edit/{id}', 'AdminController@edit');
Route::post('/art/{id}/update', 'AdminController@update');
Route::get('/notfound', 'notfoundController@notfound');
Route::get('art/profile/{id}','AdminController@profile');
Route::get('admin/profile/{id}','AdminController@profile1');
});

Route::group(['middleware' => ['auth', 'CheckRole:art']], function(){
Route::get('/home', 'ArtController@index');
});