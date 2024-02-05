<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasborController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Riwayat_transaksiController;
use App\Http\Controllers\laporan_keuanganController;
use App\Http\Controllers\KategoriController;
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

Route::get('/', function(){
    return view('front');
})->name('front');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');


Route::middleware('auth')->group(function () {
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    Route::get('help', function() {
        return view('component.help');
    })->name('help');

    Route::resource('dasbor', DasborController::class);
    
    Route::resource('data_transaksi', TransaksiController::class);
    Route::get('/transaksi/selesai/{id}', [TransaksiController::class, 'selesai'])->name('transaksi.selesai');

    Route::resource('data_transaksi', invoiceController::class);
    
    Route::resource('riwayat_transaksi', Riwayat_transaksiController::class);

    Route::resource('laporan_keuangan', laporan_keuanganController::class);

    Route::resource('kategori', KategoriController::class);
});

