<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangAPIController extends Controller
{

    public function tambahBarang(Request $request)
    {
        $barang = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga
        ]);

        return response()->json([
            'success' => true,
            'data' => $barang
        ], 201);
    }

    public function cekBarang()
    {
        $barang = Barang::all();
        return response()->json([
            'success' => true,
            'data' => $barang
        ]);
    }
}