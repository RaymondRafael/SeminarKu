<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\AuthenticateRole;

// ======================= HALAMAN UTAMA =======================
Route::get('/', [IndexController::class, 'index'])->name('index');

// ======================= AUTH =======================
// Login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

// ======================= REDIRECT PER ROLE =======================

// ADMIN
Route::middleware([\App\Http\Middleware\AuthenticateRole::class . ':Admin'])->group(function () {
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
});

// PANITIA
Route::middleware([\App\Http\Middleware\AuthenticateRole::class . ':Panitia'])->group(function () {
    Route::get('/panitia/index', [PanitiaController::class, 'index'])->name('panitia.index');
});

// KEUANGAN
Route::middleware([\App\Http\Middleware\AuthenticateRole::class . ':Keuangan'])->group(function () {
    Route::get('/keuangan/index', [KeuanganController::class, 'index'])->name('keuangan.index');
});

// PESERTA
Route::middleware([\App\Http\Middleware\AuthenticateRole::class . ':Peserta'])->group(function () {
    Route::get('/peserta/index', [PesertaController::class, 'index'])->name('peserta.index');
});
