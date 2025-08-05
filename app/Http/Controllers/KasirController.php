<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    public function index()
    {
        $barang = Barang::paginate(10);
        return view('kasir.index', compact('barang'));
    }

    public function checkout(Request $request)
    {
        DB::beginTransaction();
        try {
            // Validasi input
            $request->validate([
                'barang_id' => 'required|array',
                'barang_id.*' => 'exists:barangs,id',
                'jumlah' => 'required|array',
                'jumlah.*' => 'integer|min:1',
                'total_harga' => 'required|numeric|min:0'
            ]);

            $totalBarang = array_sum($request->jumlah);
            $totalHarga = $request->total_harga;

            $transaksi = Transaksi::create([
                'tanggal' => now(),
                'total_barang' => $totalBarang,
                'total_harga' => $totalHarga
            ]);

            foreach ($request->barang_id as $index => $barangId) {
                $barang = Barang::findOrFail($barangId);
                
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'barang_id' => $barangId,
                    'harga' => $barang->harga,  
                    'jumlah' => $request->jumlah[$index]
                ]);
            }

            DB::commit();

            return redirect()->route('transaksi.show', $transaksi->id)
                   ->with('success', 'Transaksi berhasil disimpan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan transaksi: '.$e->getMessage())
                        ->withInput();
        }
    }
}