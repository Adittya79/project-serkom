<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('serkom.index');
});
Route::get('/dashboard', function () {
    return view('serkom.dashboard');
})->name('dashboard');
Route::get('/inventory', function () {
    return view('serkom.inventory');
})->name('inventory');
Route::get('/buat_peminjaman', function () {
    return view('serkom.buat_peminjaman');
})->name('buat_peminjaman');
Route::get('/history', function () {
    return view('serkom.history');
})->name('history');
Route::get('/sedang_dipinjam', function () {
    return view('serkom.sedang_dipinjam');
})->name('sedang_dipinjam');
Route::get('/sudah_dikembalikan', function () {
    return view('serkom.sudah_dikembalikan');
})->name('sedang_dipinjam');
