<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {


});

Route::get('/kategori', [APIController::class, 'kategori'])->name('api.listkategori');
Route::get('/cari', [APIController::class, 'searching'])->name('api.search'); 
Route::get('/post', [APIController::class, 'lihat'])->name('api.list');
Route::get('/post/kategori/{idkategori}', [APIController::class, 'sortKategori'])->name('api.singlekategori');
Route::get('/post/{idpost}', [APIController::class, 'detail'])->name('api.single');