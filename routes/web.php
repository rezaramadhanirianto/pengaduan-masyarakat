<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/regist', 'ManualAuthController@register')->name('regist');
Route::get('/register-petugas', 'ManualAuthController@registerPetugas')->name('register-petugas');
Route::get('/register-admin', 'ManualAuthController@registerAdmin')->name('register-admin');
Route::post('/register-petugas', 'Auth\RegisterController@register');
Route::post('/register-admin', 'Auth\RegisterController@register');

Route::middleware(['check'])->group(function ()
{
    Route::post('/home', 'MasyarakatController@pengaduan');
    Route::get('/history', 'MasyarakatController@history')->name('history');
    Route::get('/history/{id}', 'MasyarakatController@lihathistory')->name('history.lihat');
});


Route::middleware(['admin'])->group(function ()
{
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/hapus/{id}', 'AdminController@hapus')->name('admin.hapus');
    Route::post('/admin', 'AdminController@admin');
    Route::get('/admin/edit/{id}', 'AdminController@edit')->name('admin.edit');
    Route::post('/admin/update', 'AdminController@update')->name('admin.update');
    Route::get('/admin/report', 'AdminController@report')->name('report');    
    Route::post('/admin/report', 'AdminController@filterReport');
});

Route::middleware(['petugas'])->group(function ()
{
    Route::get('/lihat-pengaduan/{id}', 'PetugasController@lihatPengaduan')->name('lihat-pengaduan');
    Route::post('/tambah-tanggapan', 'PetugasController@tambahTanggapan')->name('tanggapan');    
    Route::get('/petugas', 'PetugasController@index')->name('petugas');
});


Route::get('/verifikasi', 'PetugasController@verifikasi')->name('verifikasi');

Route::get('/template',function ()
{
    return view('layouts.templates');
});


Route::get('/profil', 'ManualAuthController@profile')->name('profil');
Route::post('/profil', 'ManualAuthController@ubahprofile');
