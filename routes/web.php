<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NilaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- 1. ROUTE PUBLIC / GUEST (Hanya bisa diakses jika BELUM login) ---
Route::middleware('guest')->group(function () {
    // Menampilkan halaman login
    Route::get('/', [AuthController::class, 'index']);
    
    // Proses autentikasi saat tombol login ditekan
    Route::post('/', [AuthController::class, 'login'])->name('login');
});


// --- ROUTE INPUT NILAI (Wajib Login Dosen) ---
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'input-nilai'], function () {
        Route::get('/', [NilaiController::class, 'index'])->name('dashboard');
        Route::post('/simpan', [NilaiController::class, 'store'])->name('nilai.store');
        Route::put('/{id}', [NilaiController::class, 'update'])->name('nilai.update');
        Route::delete('/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
    });
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});