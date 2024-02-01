<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function(){
    return view('front');
})->name('front');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');

Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('help', function() {
    return view('component.help');
})->name('help');

use App\Http\Controllers\dasborController;
Route::resource('dasbor', dasborController::class);

use App\Http\Controllers\data_transaksiController;
Route::resource('data_transaksi', data_transaksiController::class);

use App\Http\Controllers\riwayat_transaksiController;
Route::resource('riwayat_transaksi', riwayat_transaksiController::class);

use App\Http\Controllers\laporan_keuanganController;
Route::resource('laporan_keuangan', laporan_keuanganController::class);

use App\Http\Controllers\KategoriController;
Route::resource('kategori', KategoriController::class);

