<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelamatDatangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController; // Tambahkan ini

/* ... */

Route::get('/', [SelamatDatangController::class, 'index']);
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Rute autentikasi
// Route::get('/register', [AuthController::class, 'tampilRegister'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registrasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi.tampil');
Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');
Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login.tampil');
Route::get('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');

// Route::get('/siswa', [SiswaController::class, 'tampil'])->name('siswa.tampil');
// Route::get('/siswa/tambah', [SiswaController::class, 'tambah'])->name('siswa.tambah');
// Route::post('/siswa/submit', [SiswaController::class, 'submit'])->name('siswa.submit');
// Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
// Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
// Route::post('/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');