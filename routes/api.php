<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemesananBarangController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/login', [LoginController::class, 'login']);


Route::post('/register', [LoginController::class, 'register']);


Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', [LoginController::class, 'profile'] );
    Route::post('/logout', [LoginController::class, 'logout']);


    Route::put('/users/{id}', [LoginController::class, 'update']);
    Route::delete('/users/{id}', [LoginController::class, 'destroy']);

    Route::post('/simpan-paket-masuk',[PemesananBarangController::class,'simpanPaketMasuk']);
    Route::get('/data-barang-masuk',[PemesananBarangController::class, 'tampilkanDataPaketMasuk']);
    Route::get('/data-barang-all/{id}',[PemesananBarangController::class, 'tampilkanDetailPaketMasuk']);
    Route::get('/paket-user',[PemesananBarangController::class, 'tampilkanPaketMasukUser']);
    Route::get('/detail-paket-user/{kode_trans}',[PemesananBarangController::class, 'tampilkanDetailPengiriman']);

    //Route::get('/data-barang-keluar',[PemesananBarangController::class, 'tampilkanDataBarangKeluar']);
    Route::get('/pengiriman_paket', [PemesananBarangController::class,'tampilkanDataPengirimanPaket']);
    Route::put('/update-status-barang/{id}', [PemesananBarangController::class, 'updateStatusPaketMasuk']);
    Route::post('/simpan-barang-keluar', [PemesananBarangController::class, 'simpanBarangKeluar']);
    Route::get('/data-riwayat-barang-keluar', [PemesananBarangController::class, 'tampilkanDataBarangKeluar']);
    Route::get('/detail-riwayat-barang-keluar/{id}', [PemesananBarangController::class, 'tampilkanDetailBarangKeluar']);

    Route::put('/update-status-pengiriman/{id}', [PemesananBarangController::class, 'updateStatusPengirimanPaket']);
    Route::put('/batalkan-pengiriman-paket/{id}', [PemesananBarangController::class, 'batalkanPengirimanPaket']);
    Route::put('/ambil-paket/{id}', [PemesananBarangController::class, 'ambilPaket']);
});


