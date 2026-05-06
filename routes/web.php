<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use Laravel\Socialite\Facades\Socialite;

// AUTH & UTAMA
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerSubmit'])->name('register.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Login Google
Route::get('/auth/google/redirect', function () { return Socialite::driver('google')->redirect(); })->name('google.redirect');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// --- HALAMAN ADMIN (DASHBOARD) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/produk', [AdminController::class, 'produk'])->name('admin.produk');
    Route::get('/admin/kontak', [AdminController::class, 'kontak'])->name('admin.kontak');

    Route::post('/admin/produk/tambah', [AdminController::class, 'store_produk'])->name('produk.store');
    Route::get('/admin/produk/hapus/{id}', [AdminController::class, 'hapus_produk'])->name('produk.hapus');
    Route::post('/admin/produk/update/{id}', [AdminController::class, 'update_produk'])->name('produk.update');

    Route::get('/admin/koleksi/{id}', [AdminController::class, 'detail_koleksi'])->name('koleksi.detail');
    Route::post('/admin/produk-detail/store', [AdminController::class, 'store_produk_detail'])->name('produk_detail.store');
    Route::post('/admin/produk-detail/update/{id}', [AdminController::class, 'update_produk_detail'])->name('produk_detail.update');
    Route::get('/admin/produk-detail/hapus/{id}', [AdminController::class, 'hapus_produk_detail'])->name('produk_detail.hapus');

    Route::post('/admin/link/store', [AdminController::class, 'store_link'])->name('link.store');
    Route::post('/admin/link/update/{id}', [AdminController::class, 'update_link'])->name('link.update');
    Route::get('/admin/link/hapus/{id}', [AdminController::class, 'hapus_link'])->name('link.hapus');
});

// Halaman Beranda User
Route::get('/beranda', [FrontController::class, 'index'])->name('user.index');
Route::get('/sejarah', [FrontController::class, 'sejarah'])->name('user.sejarah');
Route::get('/produk', [FrontController::class, 'produk'])->name('user.produk');
Route::get('/kontak', [FrontController::class, 'kontak'])->name('user.kontak');

Route::get('/sejarah', [FrontController::class, 'sejarah'])->name('user.sejarah');

Route::get('/produk', [FrontController::class, 'produk'])->name('user.produk');
Route::get('/produk/koleksi/{id}', [FrontController::class, 'koleksi'])->name('user.koleksi');

Route::get('/kontak', [FrontController::class, 'kontak'])->name('user.kontak');
