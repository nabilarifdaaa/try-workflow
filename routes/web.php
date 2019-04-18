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
Route::get('/flow4','CalonMagangController@getAll');
Route::get('/testing','CalonMagangController@state');

Route::get('/admin', function () {
    return view('welcome');
});


Route::get('/dashboard', 'HomeController@index')->name('home');

//Info Magang

Route::get('infomagang', 'InfoMagangController@index')->name('infomagang');

Route::get('/infomagang/{id}/edit', 'InfoMagangController@edit')->name('infomagang.edit');

Route::patch('/infomagang/{id}/update', 'InfoMagangController@update')->name('infomagang.update');

Route::get('/infomagang/create','InfoMagangController@create')->name('infomagang.create');

Route::post('/infomagang/create','InfoMagangController@store')->name('infomagang.store');

Route::delete('/infomagang/{id}/delete', 'InfoMagangController@destroy')->name('infomagang.delete');

//Posisi

Route::get('posisi', 'PosisiController@index')->name('posisi');

Route::get('/posisi/create','PosisiController@create')->name('posisi.create');

Route::post('/posisi/create','PosisiController@store')->name('posisi.store');

Route::get('/posisi/{id}/edit', 'PosisiController@edit')->name('posisi.edit');

Route::get('/posisi/{id}/detail', 'PosisiController@detail')->name('posisi.detail');

Route::patch('/posisi/{id}/update', 'PosisiController@update')->name('posisi.update');

Route::delete('/posisi/{id}/delete', 'PosisiController@destroy')->name('posisi.delete');

Route::put('/posisi/setStatus', 'PosisiController@setStatus')->name('posisi.setStatus'); 

Route::put('/posisi/setStatusFalse', 'PosisiController@setStatusFalse')->name('posisi.setStatusFalse'); 

Route::put('/posisi/{id}/setTrue', 'PosisiController@setTrue')->name('posisi.setTrue');

Route::put('/posisi/{id}/setFalse', 'PosisiController@setFalse')->name('posisi.setFalse');



//Activity

Route::get('activity', 'ActivityController@index')->name('activity');

Route::get('/activity/create','ActivityController@create')->name('activity.create');

Route::post('/activity/create','ActivityController@store')->name('activity.store');

Route::get('/activity/{id}/edit', 'ActivityController@edit')->name('activity.edit');

Route::get('/activity/{id}/detail', 'ActivityController@detail')->name('activity.detail');

Route::patch('/activity/{id}/update', 'ActivityController@update')->name('activity.update');

Route::delete('/activity/{id}/delete', 'ActivityController@destroy')->name('activity.delete');

//Kuota

Route::get('kuota', 'KuotaController@index')->name('kuota');

Route::get('/kuota/create','KuotaController@create')->name('kuota.create');

Route::post('/kuota/create','KuotaController@store')->name('kuota.store');

Route::get('/kuota/{id}/edit', 'KuotaController@edit')->name('kuota.edit');

Route::patch('/kuota/{id}/update', 'KuotaController@update')->name('kuota.update');

Route::delete('/kuota/{id}/delete', 'KuotaController@destroy')->name('kuota.delete');


//calonmagang

Route::get('calonmagang', 'CalonMagangController@index')->name('calonmagang');

Route::get('/calonmagang/{id}/detail', 'CalonMagangController@detail')->name('calonmagang.detail');

Route::get('/calonmagang/{id}/edit', 'CalonMagangController@edit')->name('calonmagang.edit');

Route::patch('/calonmagang/{id}/update', 'CalonMagangController@update')->name('calonmagang.update');

Route::delete('/calonmagang/{id}/delete', 'CalonMagangController@destroy')->name('calonmagang.delete');

Route::put('/calonmagang/{id}/setTunggu', 'CalonMagangController@setTunggu')->name('calonmagang.setTunggu');

Route::put('/calonmagang/{id}/setProses', 'CalonMagangController@setProses')->name('calonmagang.setProses');

Route::put('/calonmagang/{id}/setTerima', 'CalonMagangController@setTerima')->name('calonmagang.setTerima');

Route::put('/calonmagang/{id}/setTolak', 'CalonMagangController@setTolak')->name('calonmagang.setTolak');

Route::get('/calonmagang/create','CalonMagangController@create')->name('calonmagang.create');

Route::post('/calonmagang/create','CalonMagangController@store')->name('calonmagang.store');


//Testimoni

Route::get('testimoni/getData', 'TestimoniController@getData')->name('testimoni.read');

Route::get('testimoni', 'TestimoniController@index')->name('testimoni');

Route::get('/testimoni/create','TestimoniController@create')->name('testimoni.create');

Route::post('/testimoni/create','TestimoniController@store')->name('testimoni.store');

Route::get('/testimoni/{id}/edit', 'TestimoniController@edit')->name('testimoni.edit');

Route::get('/testimoni/{id}/detail', 'TestimoniController@detail')->name('testimoni.detail');

Route::patch('/testimoni/{id}/update', 'TestimoniController@update')->name('testimoni.update');

Route::delete('/testimoni/{id}/delete', 'TestimoniController@destroy')->name('ktestimoni.delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//users calon magang
Route::get('/', 'UserController@index')->name('user');

Route::get('/position-detail/{id}', 'UserController@detail')->name('position-detail');

Route::get('/register/{id}','UserController@register')->name('register');

Route::post('register/create','UserController@store')->name('register.store');

Route::get('usercalonmagang/success', 'UserController@sukses')->name('usercalonmagang.sukses');

