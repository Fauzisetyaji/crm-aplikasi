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

Route::get('/', 'Frontend\HomeController@index')->name('user-home');
Route::get('/about', 'Frontend\AboutController@index')->name('user-about');
Route::get('/service', 'Frontend\ServiceController@index')->name('user-service');
Route::get('/gallery', 'Frontend\GalleryController@index')->name('user-gallery');
Route::get('/contact', 'Frontend\ContactController@index')->name('user-contact');

Auth::routes();

Route::middleware('auth')->namespace('Backend')->group(function () {
	Route::prefix('admin')->middleware('admin')->group(function () {
		Route::get('/dashboard', 'DashboardController@index')->name('auth-home');
		Route::resource('staff', 'StaffController');
		Route::resource('mekanik', 'MekanikController');
		Route::resource('reward', 'RewardController');
		Route::resource('operasional', 'OperasionalController');
		Route::resource('jadwal-operasional', 'JadwalOperasionalController');
		Route::resource('service', 'ServiceController');
		Route::resource('keluhan', 'KeluhanController');
		Route::resource('testimoni', 'TestimoniController');
		Route::resource('laporan', 'LaporanController');
	});

	
	Route::prefix('user')->group(function () {

	});
});

Route::get('verify-account', 'WebAuthController@verify');