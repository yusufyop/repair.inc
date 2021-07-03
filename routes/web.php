<?php

use Illuminate\Support\Facades\Route;
Route::get('/', 'HomeController@home')->name('home');
Route::get('/kategori', 'HomeController@kategori')->name('kategori');
Route::get('/artikel', 'HomeController@artikel')->name('artikel');
Route::get('/kategori/{id}', 'HomeController@kategori_detail')->name('kategori.detail');
Route::get('/jasa/{id}', 'HomeController@jasa_detail')->name('jasa.detail');
Route::get('/artikel/{id}', 'HomeController@artikel_detail')->name('artikel.detail');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/register', 'HomeController@register')->name('home.register')->middleware('guest');
Route::get('/login', 'HomeController@login')->name('login')->middleware('guest');

Route::post('/login', 'LoginController@postLogin');
Route::post('/register/post', 'LoginController@register_store')->name('register.store');
Route::get('/logout', 'LoginController@logout');


// ADMIN
Route::prefix('admin')->middleware('auth:admin')->group(function () {
	Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');

	Route::prefix('customer')->group(function () {
		Route::get('/', 'AdminController@customer')->name('admin.customer');
		Route::post('/edit/{id}', 'CustomerController@edit')->name('admin.customer.edit');
		Route::post('/delete/{id}', 'CustomerController@delete')->name('admin.customer.delete');
	});

	Route::prefix('mitra')->group(function () {
		Route::get('/', 'AdminController@mitra')->name('admin.mitra');
		Route::post('/store', 'MitraController@store')->name('admin.mitra.store');
		Route::post('/edit/{id}', 'MitraController@edit')->name('admin.mitra.edit');
		Route::post('/delete/{id}', 'MitraController@delete')->name('admin.mitra.delete');
	});

	Route::prefix('jasa')->group(function () {
		Route::get('/', 'AdminController@jasa')->name('admin.jasa');
		Route::post('/edit/{id}', 'JasaController@edit')->name('admin.jasa.edit');
		Route::post('/delete/{id}', 'JasaController@delete')->name('admin.jasa.delete');

		Route::prefix('kategori')->group(function () {
			Route::get('/', 'AdminController@kategori')->name('admin.jasa.kategori');
			Route::post('/store', 'KategoriController@store')->name('admin.jasa.kategori.store');
			Route::post('/edit/{id}', 'KategoriController@edit')->name('admin.jasa.kategori.edit');
			Route::post('/delete/{id}', 'KategoriController@delete')->name('admin.jasa.kategori.delete');
		});
	});

	Route::prefix('artikel')->group(function () {
		Route::get('/', 'AdminController@artikel')->name('admin.artikel');
		Route::post('/store', 'ArtikelController@store')->name('admin.artikel.store');
		Route::post('/edit/{id}', 'ArtikelController@edit')->name('admin.artikel.edit');
		Route::post('/delete/{id}', 'ArtikelController@delete')->name('admin.artikel.delete');
	});

	Route::prefix('faq')->group(function () {
		Route::get('/', 'AdminController@faq')->name('admin.faq');
		Route::post('/store', 'faqController@store')->name('admin.faq.store');
		Route::post('/edit/{id}', 'faqController@edit')->name('admin.faq.edit');
		Route::post('/delete/{id}', 'faqController@delete')->name('admin.faq.delete');
	});
});



// MITRA
Route::prefix('mitra')->middleware('auth:mitra')->group(function () {
	Route::get('/', 'MitraController@dashboard')->name('mitra.dashboard');

	Route::prefix('jasa')->group(function () {
		Route::get('/', 'MitraController@jasa')->name('mitra.jasa');
		Route::post('/store', 'JasaController@store')->name('mitra.jasa.store');
		Route::post('/edit/{id}', 'JasaController@edit')->name('mitra.jasa.edit');
		Route::post('/delete/{id}', 'JasaController@delete')->name('mitra.jasa.delete');
	});

	Route::prefix('pesanan')->group(function () {
		Route::get('/', 'MitraController@pesanan')->name('mitra.pesanan');

		Route::get('/tolak/{id}', 'PesananController@tolak')->name('mitra.pesanan.tolak');
		Route::get('/setujui/{id}', 'PesananController@setujui')->name('mitra.pesanan.setujui');
		Route::post('/konfirmasi-bayar', 'PesananController@konfirmasi_bayar')->name('mitra.pesanan.konfirmasi_bayar');
		Route::get('/konfirmasi-selesai/{id}', 'PesananController@konfirmasi_selesai')->name('mitra.pesanan.konfirmasi_selesai');
	});
});



// CUSTOMER
Route::prefix('customer')->middleware('auth:customer')->group(function () {
	Route::get('/', 'CustomerController@dashboard')->name('customer.dashboard');
	Route::get('/', 'CustomerController@profile')->name('customer.profile');
	Route::get('/order', 'CustomerController@order')->name('customer.order');
	Route::get('/pembayaran/{id}', 'CustomerController@pembayaran')->name('customer.pembayaran');
	Route::get('/chat', 'CustomerController@chat')->name('customer.chat');
	Route::get('/proses/{id}', 'CustomerController@proses')->name('customer.proses');

	Route::post('/garansi/post', 'GaransiController@store')->name('customer.garansi.store');
	Route::post('/garansi/edit/{id}', 'GaransiController@edit')->name('customer.garansi.edit');
	Route::post('/garansi/delete/{id}', 'GaransiController@delete')->name('customer.garansi.delete');

	Route::post('/feedback/post', 'FeedbackController@store')->name('customer.feedback.store');
	Route::post('/feedback/edit/{id}', 'FeedbackController@edit')->name('customer.feedback.edit');
	Route::post('/feedback/delete/{id}', 'FeedbackController@delete')->name('customer.feedback.delete');

	Route::post('/ratting/post', 'RattingController@store')->name('customer.order.ratting.post');

	Route::post('/order', 'PesananController@store')->name('customer.order.post');
	Route::post('/kirim-bukti/{id}', 'PesananController@kirim_bukti')->name('customer.order.bukti.post');

	// bagian profile customer
	Route::get('/profile/{id}', 'CustomerController@profile')->name('customer.profile');
	Route::get('/profile/{id}/edit', 'CustomerController@profileEdit')->name('customer.profile.edit');
	Route::put('/profile/{id}/edit', 'CustomerController@profileData')->name('profileData');
});