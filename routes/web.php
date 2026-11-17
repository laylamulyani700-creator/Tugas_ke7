<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;

// Halaman utama bawaan Laravel
Route::get('/', function () {
    return view('welcome');
});

// Contoh route teks langsung
Route::get('/katalog-teks', function () {
    return "Halo, ini halaman Katalog Kasir pertama saya!";
});

// Route yang terhubung ke KatalogController (Menampilkan semua katalog)
Route::get('/katalog', [KatalogController::class, 'index']);

// Route dengan parameter ID (Untuk melihat detail produk berdasarkan ID)
Route::get('/katalog/{id}', [KatalogController::class, 'show']);

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');