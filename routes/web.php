<?php

use Illuminate\Support\Facades\Route;
use App\Models\elaundry;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\dasborController;
Route::resource('dasbor', dasborController::class);

use App\Http\Controllers\data_transaksiController;
Route::resource('data_transaksi', data_transaksiController::class);

use App\Http\Controllers\riwayat_transaksiController;
Route::resource('riwayat_transaksi', riwayat_transaksiController::class);

use App\Http\Controllers\laporan_keuanganController;
Route::resource('laporan_keuangan', laporan_keuanganController::class);