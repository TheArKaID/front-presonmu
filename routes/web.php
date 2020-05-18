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
    Route::get('/dashboard/pendaftar', 'AdminController@pendaftar');

    Route::get('/dashboard/setting/tahun', 'AdminController@tahun');
    Route::post('/dashboard/setting/tahun/tambah', 'AdminController@tambahTahun');
    Route::post('/dashboard/setting/tahun/simpan', 'AdminController@simpanTahun');

    Route::get('/dashboard/setting/tentang', 'AdminController@tentang');
    Route::post('/dashboard/setting/tentang/simpan', 'AdminController@simpanTentang');

    Route::get('/dashboard/setting/kegiatan', 'AdminController@kegiatan');
    Route::post('/dashboard/setting/kegiatan/tambah', 'AdminController@tambahKegiatan');
    Route::post('/dashboard/setting/kegiatan/hapus', 'AdminController@hapusKegiatan');

    Route::get('/dashboard/setting/alur', 'AdminController@alur');
    Route::post('/dashboard/setting/alur/tambah', 'AdminController@tambahAlur');
    Route::post('/dashboard/setting/alur/simpan', 'AdminController@simpanAlur');
    Route::post('/dashboard/setting/alur/hapus', 'AdminController@hapusAlur');

    Route::get('/dashboard/setting/kesan', 'AdminController@kesan');
    Route::post('/dashboard/setting/kesan/tambah', 'AdminController@tambahKesan');
    Route::post('/dashboard/setting/kesan/hapus', 'AdminController@hapusKesan');

    Route::get('/logout','AdminController@logout'); 
});

// Route::get('/masadi', 'FrontController@masadi');