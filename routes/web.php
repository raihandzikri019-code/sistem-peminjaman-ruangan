<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\LaporanController;


/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
})->name('home');


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    return view('dashboard');

})->name('dashboard');


/*
|--------------------------------------------------------------------------
| Data Peminjaman
|--------------------------------------------------------------------------
*/

Route::resource('peminjaman', PeminjamanController::class);


/*
|--------------------------------------------------------------------------
| Persetujuan Peminjaman
|--------------------------------------------------------------------------
*/

Route::get('/persetujuan', [PersetujuanController::class, 'index'])
    ->name('persetujuan.index');

Route::patch('/persetujuan/{peminjaman}/setujui', [PersetujuanController::class, 'setujui'])
    ->name('persetujuan.setujui');

Route::patch('/persetujuan/{peminjaman}/tolak', [PersetujuanController::class, 'tolak'])
    ->name('persetujuan.tolak');


/*
|--------------------------------------------------------------------------
| Data Ruangan
|--------------------------------------------------------------------------
*/

Route::resource('ruangan', RuanganController::class);


/*
|--------------------------------------------------------------------------
| Laporan
|--------------------------------------------------------------------------
*/

Route::get('/laporan', [LaporanController::class, 'index'])
    ->name('laporan.index');