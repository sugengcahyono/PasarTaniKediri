<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\UploadBeritaController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('Auth.login');
})->middleware('auth.redirect');

Route::get('login', [SidebarController::class, 'login'])->name('login')->middleware('auth.redirect');

// Route::get('masuk', [UserController::class, 'masuk'])->name('masuk')->middleware('auth.redirect');
Route::post('login', [UserController::class, 'login']);

Route::get('daftar', [UserController::class, 'Daftar'])->name('daftar')->middleware('auth.redirect');
Route::post('register', [UserController::class, 'register'])->name('register.post');

Route::post('keluar', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth.admin'])->group(function () {
    Route::get('dashboard', [SidebarController::class, 'dashboard'])->name('dashboardadmin');
    Route::get('produk', [SidebarController::class, 'produk'])->name('adminproduk');
    Route::get('kabar-tani', [SidebarController::class, 'berita'])->name('adminberita');
    Route::get('data-pengguna', [SidebarController::class, 'pengguna'])->name('adminpengguna');
    Route::get('profil', [SidebarController::class, 'profil'])->name('adminprofil');
});


Route::post('/upload/berita', [UploadBeritaController::class, 'Upload'])->name('uploadBerita');

Route::get('/upload/hapus/{id}', [UploadBeritaController::class, 'hapus'])->name('upload.hapus');
Route::get('/detail-berita/{id}', [SidebarController::class, 'detailBerita'])->name('detail.kabar');
Route::put('/berita/update/{id}', [UploadBeritaController::class, 'update'])->name('updateBerita');
