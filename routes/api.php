<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\API\BarangAPIController;

Route::prefix('v1')->group(function () {
    Route::post('/barang/tambah', [BarangAPIController::class, 'tambahBarang']);
    Route::get('/barang/cek', [BarangAPIController::class, 'cekBarang']);
    
    Route::post('/transaksi/buat', [TransaksiController::class, 'storeApi']);
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Endpoint tidak ditemukan'
    ], 404);
});