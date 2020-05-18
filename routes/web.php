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

Route::get('/', 'FrontController@home');
Route::post('/daftar', 'FrontController@daftar');

Route::get('/admin', 'AdminController@login')->name('login');
Route::post('/proseslogin', 'AdminController@prosesLogin');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard','AdminController@dashboard'); 

    // Setting
    Route::get('/dashboard/tahun', 'AdminController@tahun');
    Route::post('/dashboard/tahun/tambah', 'AdminController@tambahTahun');
    Route::post('/dashboard/tahun/simpan', 'AdminController@simpanTahun');

    Route::get('/pendaftar', 'AdminController@pendaftar');

    Route::get('/dashboard/tentang', 'AdminController@tentang');
    Route::post('/dashboard/tentang/simpan', 'AdminController@simpanTentang');

    Route::get('/dashboard/kegiatan', 'AdminController@kegiatan');
    Route::post('/dashboard/kegiatan/tambah', 'AdminController@tambahKegiatan');

    Route::get('/dashboard/alur', 'AdminController@alur');
    Route::post('/dashboard/alur/tambah', 'AdminController@tambahAlur');
    Route::post('/dashboard/alur/simpan', 'AdminController@simpanAlur');
    Route::post('/dashboard/alur/hapus', 'AdminController@hapusAlur');

    Route::get('/dashboard/kesan', 'AdminController@kesan');
    Route::post('/dashboard/kesan/tambah', 'AdminController@tambahKesan');
    Route::post('/dashboard/kesan/hapus', 'AdminController@hapusKesan');

    Route::get('/logout','AdminController@logout'); 
});

// Route::get('/masadi', 'FrontController@masadi');