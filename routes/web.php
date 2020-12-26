<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DataKategoriController;


use App\Http\Controllers\AuthenticationController;

use App\Http\Controllers\DashboardPenulisController;
use App\Http\Controllers\PostinganPenulisController;
use App\Http\Controllers\HapusKomentarController;
//use App\Http\Controllers\PenulisController;

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

Route::get('/', [HomeController::class, 'lihat']);
Route::get('/detailpost/{idpost}', [HomeController::class, 'detail']);
Route::get('/cari', [HomeController::class, 'searching']);
Route::post('/detailpost/{idpost}', [HomeController::class, 'tambahKomentar']);
Route::get('/kategori/{idkategori}', [HomeController::class, 'sortKategori']);


//penulis
Route::middleware('penulis')->group(function () {
    Route::get('/penulis/dashboard', [DashboardPenulisController::class, 'index']);
    Route::get('/penulis/editprofile', [DashboardPenulisController::class, 'tampilFormEdit']);
    Route::post('/penulis/editprofile', [DashboardPenulisController::class, 'simpan']);
    Route::get('/penulis/post', [DashboardPenulisController::class, 'daftarPostingan']);
    Route::get('/penulis/edit/{idpost}', [DashboardPenulisController::class, 'edit']);
    Route::get('/penulis/hapus/{idpost}', [DashboardPenulisController::class, 'hapus']);

    Route::get('/penulis/tambahpost', [PostinganPenulisController::class, 'formTambah']);
    Route::post('/penulis/tambahpost', [PostinganPenulisController::class, 'tambahPost']);
    Route::post('/penulis/edit/{idpost}', [PostinganPenulisController::class, 'simpanEdit']);

    Route::get('/detailpost/hapus/{idkomentar}', [HapusKomentarController::class, 'hapusKomentar']);
    Route::get('/cetak/{idpost}', [PostinganPenulisController::class, 'generatePDF']);
});

Route::get('/logout', function (){
    auth()->logout();
    return redirect('/');
});

// Rute (url), View
Route::view('login', 'login');
Route::post('login', [AuthenticationController::class, 'login']);

Route::view('daftar', 'daftar');
Route::post('daftar', [RegistrationController::class, 'register']);

//admin
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'tampilDashboardAdmin']);
    Route::get('/admin/editprofil', [DashboardAdminController::class, 'tampilFormEdit']);
    Route::post('/admin/editprofil', [DashboardAdminController::class, 'simpan']);
    Route::get('/admin/data_penulis', [DashboardAdminController::class, 'dataPenulis']);
    Route::post('/admin/edit_penulis/{idpenulis}', [DashboardAdminController::class, 'editPassword']);
    Route::get('/admin/edit_penulis/{idpenulis}', [DashboardAdminController::class, 'tampilEditPassword']);

    Route::get('/admin/data_kategori', [DataKategoriController::class, 'dataKategori']);
    Route::post('/admin/data_kategori', [DataKategoriController::class, 'tambahKategori']);
    Route::get('/admin/edit_kategori/{idkategori}', [DataKategoriController::class, 'tampilEditKategori']);
    Route::post('/admin/edit_kategori/{idkategori}', [DataKategoriController::class, 'editKategori']);
    Route::get('/admin/hapus_kategori/{idkategori}', [DataKategoriController::class, 'hapusKategori']);
    Route::get('/admin/data_penulis/export', [DashboardAdminController::class, 'export']);

    Route::get('/system/linkStorage', 'DashboardAdminController@linkStorage')->name('system.linkStorage');
});
