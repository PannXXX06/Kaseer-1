<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KasirController;

// Rute Utama
Route::get('/', function () {
    return redirect()->route('kasir.index');
})->name('home');

// Rute Barang (CRUD)
Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/{barang}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
});

Route::resource('transaksi', TransaksiController::class)->only(['index', 'show']);

Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
Route::post('/kasir/checkout', [KasirController::class, 'checkout'])->name('kasir.checkout');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');


Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('transaksi.laporan');