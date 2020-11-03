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
Route::get('/noaccess', function () {
    return view('welcome');
});
Route::post('/back', 'AuthController@back')->name('back');
//lupapw
Route::get('/forgot_password', 'securityController@forgot');
Route::post('/forgot_pass', 'securityController@forgotpw');
//veriftoken
Route::get('/forgot_password/reset', 'securityController@verifytoken');
Route::post('/activationtoken', 'securityController@postverifytoken');
//resetpw
// Route::get('/resetpassword/{active_token}', 'securityController@reset')->name('resetpassword');
Route::resource('/resetpassword', 'ResetPasswordController');
Route::resource('/updatepassword', 'ResetPasswordController');
//Route::get('/resetpassword/{id}', 'securityController@ubah')->name('resetpassword');

//Auth::Routes(['verify'=>true]);
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/postlogin','LoginController@postlogin');
Route::get('/logout', 'LoginController@logout');
Route::get('/admin/register', 'AuthController@adminregister');
Route::post('/postregister', 'AuthController@postregister');
Route::get('/register', 'AuthController@register');
Route::post('/postregis', 'AuthController@postregis');


//ADMIN
Route::group(['middleware' => ['auth', 'checkrole:admin']], function(){
Route::get('/dashboard', 'DashboardController@index');
Route::get('/dataart', 'AdminController@dataart');
Route::get('/datamaster', 'AdminController@datamaster');
Route::post('/dataart/create','AdminController@create');
Route::get('/art/edit/{id}', 'AdminController@edit');
Route::post('/art/{id}/update', 'AdminController@update');
Route::get('/notfound', 'notfoundController@notfound');
Route::get('/art/profile/{id}','AdminController@profilart');
Route::get('/master/profile/{id}','AdminController@profilmaster');
//profil admin
Route::get('/dataku/{id}','C_ProfileAdmin@profiladmin');
Route::get('/dataku/edit/{id}', 'C_ProfileAdmin@editadmin');
Route::post('/admin/{id}/update', 'C_ProfileAdmin@updateadmin');
Route::get('/dataku/edit/gantipassword/{id}', 'C_ProfileAdmin@gantipw');
Route::post('/updatepassword/{id}', 'C_ProfileAdmin@updatepass');
});

//art dan naster
// Route::group(['middleware' => ['auth', 'checkrole:master, art']], function(){


// });

//art
Route::group(['middleware' => ['auth', 'checkrole:art']], function(){
Route::get('/homes', 'ArtController@maid');
Route::get('/errors', 'ArtController@error');
Route::get('/profilku/{id}', 'ArtController@profil1');
Route::get('/profilku/setting/{id}', 'ArtController@setting1');
Route::post('/profilku/update/{id}', 'ArtController@update1');
});


// //master
Route::group(['middleware' => ['auth', 'checkrole:master']], function(){
Route::get('/home', 'C_home@home');
Route::get('/error', 'MasterController@error');
Route::get('/aboutus', 'MasterController@about');
Route::get('/myprofil/{id}', 'MasterController@profilku');
Route::get('/myprofil/setting/{id}', 'MasterController@setting');
Route::post('/myprofil/update/{id}', 'MasterController@update');
Route::get('/myprofil/changepassword/{id}', 'MasterController@changepw');
Route::post('/postpassword/{id}', 'MasterController@postpass');
});