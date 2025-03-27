<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController; // Tambahkan import controller

// Halaman utama
Route::get('/', function () {
    return view('home');
});

// Halaman About
Route::get('/about', function () {
    return view('about', ['nama' => 'Evans Al Fahmi']);
});

// Halaman Blog (Menampilkan daftar artikel)
Route::get('/blog', [ArticleController::class, 'index'])->name('blog.index');

// Halaman Detail Artikel (Menampilkan satu artikel berdasarkan ID)
Route::get('/blog/{id}', [ArticleController::class, 'show'])->name('blog.show');

// Halaman Form Tambah Artikel
Route::get('/blog/create', [ArticleController::class, 'create'])->name('blog.create');

// Proses Simpan Artikel
Route::post('/blog', [ArticleController::class, 'store'])->name('blog.store');

// Halaman Contact
Route::get('/contact', function () {
    return view('contact');
});
