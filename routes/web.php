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
Route::get('/resetpassword', 'securityController@reset')->name('resetpassword');
// Route::resource('/resetpassword', 'ResetPasswordController');
Route::resource('updatepassword', 'ResetController');
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
Route::get('/notfound', 'notfoundController@notfound');
//data art
Route::get('/dataart', 'AdminController@dataart');
Route::post('/dataart/create','AdminController@create');
Route::get('/art/edit/{id}', 'AdminController@edit');
Route::post('/art/{id}/update', 'AdminController@update');
//data master
Route::get('/art/profile/{id}','AdminController@profilart');
Route::get('/datamaster', 'AdminController@datamaster');
Route::get('/master/profile/{id}','AdminController@profilmaster');
//profil admin
Route::get('/dataku/{id}','C_ProfileAdmin@profiladmin');
Route::get('/dataku/edit/{id}', 'C_ProfileAdmin@editadmin');
Route::post('/admin/{id}/update', 'C_ProfileAdmin@updateadmin');
Route::get('/dataku/edit/gantipassword/{id}', 'C_ProfileAdmin@gantipw');
Route::post('/updatepassword/{id}', 'C_ProfileAdmin@updatepass');
//data paket pekerjaan
Route::get('/paket_pekerjaan', 'C_Paket_Pekerjaan@index');
Route::post('/paket_pekerjaan/create','C_Paket_Pekerjaan@create');
Route::get('/paket_pekerjaan/{id}', 'C_Paket_Pekerjaan@show');
Route::get('/paket_pekerjaan/edit/{id}', 'C_Paket_Pekerjaan@edit');
Route::post('/paket_pekerjaan/update/{id}', 'C_Paket_Pekerjaan@update');
});


//art
Route::group(['middleware' => ['auth', 'checkrole:art']], function(){
Route::get('/index', 'ArtController@maid');
Route::get('/errors', 'ArtController@error');
Route::get('/profilku/{id}', 'ArtController@profilart');
Route::get('/profilku/setting/{id}', 'ArtController@settingart');
Route::post('/profilku/update/{id}', 'ArtController@updateart');
Route::post('/profilku/deskripsi/{id}', 'ArtController@updatedesk');
Route::get('/profilku/changepassword/{id}', 'ArtController@editpass');
Route::post('/postpass/{id}', 'ArtController@updatepass');
Route::get('/about_us', 'ArtController@about');

});


// //master
Route::group(['middleware' => ['auth', 'checkrole:master']], function(){
Route::get('/home', 'C_home@home');
Route::get('/error', 'MasterController@error');
Route::get('/aboutus', 'MasterController@about');
Route::get('/contactus', 'MasterController@contact');
Route::get('/myprofil/{id}', 'MasterController@profilku');
Route::get('/myprofil/setting/{id}', 'MasterController@setting');
Route::post('/myprofil/update/{id}', 'MasterController@update');
Route::get('/myprofil/changepassword/{id}', 'MasterController@changepass');
Route::post('/postpassword/{id}', 'MasterController@postpass');
});
