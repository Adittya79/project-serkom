<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangsController;
use App\Http\Controllers\Inventory;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PeminjamanController::class, 'index'])->name('dashboard');
    Route::get('/inventory', [Inventory::class, 'index'])->name('inventory');
    // Taruh route lain yang butuh login di sini...
});
Route::get('dashboard', [PeminjamanController::class, 'index'])->name('dashboard');
Route::get('buat_peminjaman', [PeminjamanController::class, 'create'])->name('buat_peminjaman');
Route::post('buat_peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::prefix('barangs')->group(function () {
    Route::get('/create', [BarangsController::class, 'create'])->name('buat_barang');
    Route::post('/', [BarangsController::class, 'store'])->name('barang.store');
    Route::get('/{barangs}/edit', [BarangsController::class, 'edit'])->name('editBarang');
    Route::put('/{barang}', [BarangsController::class, 'update'])->name('update.barang');
    Route::delete('/{barang}', [BarangsController::class, 'destroy'])->name('hapus.barang');
});
Route::get('inventory', [Inventory::class, 'index'])->name('inventory');
Route::get('buat_barang', [BarangsController::class, 'create'])->name('buat_barang');
Route::get('barangs', [BarangsController::class, 'Index'])->name('inventory_barang');
Route::post('buat_barang', [BarangsController::class, 'store'])->name('barang.store');
Route::get('buat_barang/{barangs}/edit', [BarangsController::class, 'edit'])->name('inventory.store');
Route::put('buat_barang/{barang}', [BarangsController::class, 'update'])->name('barang.update');
Route::delete('buat_barang/{barang}', [BarangsController::class, 'destroy'])->name('barang.delete');
Route::get('/{id}', [PeminjamanController::class, 'show'])->name('show');
Route::get('/{id}/edit', [PeminjamanController::class, 'edit'])->name('edit');
Route::put('/{id}', [PeminjamanController::class, 'update'])->name('update');
Route::delete('/{id}', [PeminjamanController::class, 'destroy'])->name('destroy');
Route::get('/{id}/print', [PeminjamanController::class, 'print'])->name('print');
