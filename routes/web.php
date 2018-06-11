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
		Route::resource('pelanggan', 'PelangganController');
		Route::resource('mekanik', 'MekanikController');
		Route::resource('reward', 'RewardController');
		Route::resource('artikel', 'ArtikelController');
		Route::resource('booking', 'BookingController', ['except' => ['destroy']]);
		Route::name('booking.confirm')->put('booking/confirm/{id}', 'BookingController@confirm');
		Route::name('booking.cancel')->put('booking/cancel/{id}', 'BookingController@cancel');
		Route::resource('operasional', 'OperasionalController');
		Route::resource('jadwal-operasional', 'JadwalOperasionalController');
		Route::resource('promo', 'PromoController');
		Route::name('promo-non-pelanggan.index')->get('promo-non-pelanggan', 'PromoNonPelangganController@index');
		Route::name('promo-non-pelanggan.create')->get('promo-non-pelanggan/create', 'PromoNonPelangganController@create');
		Route::name('promo-non-pelanggan.store')->post('promo-non-pelanggan/store', 'PromoNonPelangganController@store');
		Route::name('promo-non-pelanggan.edit')->get('promo-non-pelanggan/edit/{id}', 'PromoNonPelangganController@edit');
		Route::name('promo-non-pelanggan.update')->put('promo-non-pelanggan/update/{id}', 'PromoNonPelangganController@update');
		Route::name('promo-non-pelanggan.destroy')->delete('promo-non-pelanggan/destroy/{id}', 'PromoNonPelangganController@destroy');
		Route::resource('service', 'ServiceController');
		Route::resource('keluhan', 'KeluhanController');
		Route::resource('testimoni', 'TestimoniController');
		Route::name('profile.ubah')->get('profile', 'ProfileController@ubah');
		Route::name('profile.update')->put('profile/{id}', 'ProfileController@update');
		Route::name('profile.updatePassword')->put('profile-password/{id}', 'ProfileController@updatePassword');

		Route::name('laporan.bookings')->get('laporan/booking', 'LaporanController@getLaporanBooking');
		Route::name('laporan.services')->get('laporan/service', 'LaporanController@getLaporanService');
		Route::name('laporan.keluhan')->get('laporan/keluhan', 'LaporanController@getLaporanKeluhan');
		Route::name('laporan.pelanggans')->get('laporan/pelanggan', 'LaporanController@getLaporanPelanggan');
		Route::name('laporan.pelanggans-baru')->get('laporan/pelanggan-baru', 'LaporanController@getLaporanPelangganBaru');
	});

	
	Route::prefix('user')->namespace('User')->middleware('pelanggan')->group(function () {
		Route::get('/dashboard', 'DashboardController@index')->name('auth-home-user');
		Route::resource('my-booking', 'BookingController', ['except' => ['destroy']]);
		Route::name('my-booking.cancel')->put('my-booking/cancel/{id}', 'BookingController@cancel');
		Route::resource('my-keluhan', 'KeluhanController');
		Route::resource('my-testimoni', 'TestimoniController');
		Route::resource('my-profile', 'ProfileController');
		Route::resource('my-history', 'HistoryController');
		Route::name('my-history.cetak')->get('my-history/cetak/{id}', 'HistoryController@cetak');
		Route::name('reward.claim')->put('reward/claim/{id}', 'ProfileController@claim');
		Route::name('ubah-profile.ubah')->get('ubah-profile', 'ProfileController@ubah');
		Route::name('ubah-profile.update')->put('ubah-profile/{id}', 'ProfileController@update');
		Route::name('ubah-profile.updatePassword')->put('ubah-password/{id}', 'ProfileController@updatePassword');
	});

	Route::prefix('kepala-cabang')->group(function () {
		Route::get('/dashboard', 'DashboardController@index')->name('auth-home-branch');

		Route::name('laporan.booking')->get('laporan/booking', 'LaporanController@getLaporanBooking');
		Route::name('laporan.service')->get('laporan/service', 'LaporanController@getLaporanService');
		Route::name('laporan.pelanggan')->get('laporan/pelanggan', 'LaporanController@getLaporanPelanggan');
		Route::name('laporan.pelanggan-baru')->get('laporan/pelanggan-baru', 'LaporanController@getLaporanPelangganBaru');
	});

});

Route::get('verify-account', 'WebAuthController@verify');