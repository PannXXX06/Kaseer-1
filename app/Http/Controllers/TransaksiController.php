<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::query()->with('detailTransaksis.barang');

        if ($request->has('start_date') && $request->start_date != '') {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }
        
        if ($request->has('end_date') && $request->end_date != '') {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }

        $transaksis = $query->orderBy('tanggal', 'desc')->paginate(10);

        return view('transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::with(['detailTransaksis.barang'])
                    ->findOrFail($id);
                    
        return view('transaksi.show', compact('transaksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|array',
            'barang_id.*' => 'exists:barangs,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'integer|min:1',
            'harga' => 'required|array',
            'harga.*' => 'numeric|min:0'
        ]);

        DB::beginTransaction();
        try {
            $totalBarang = array_sum($request->jumlah);
            $totalHarga = 0;
            
            foreach ($request->harga as $index => $harga) {
                $totalHarga += $harga * $request->jumlah[$index];
            }

            $transaksi = Transaksi::create([
                'tanggal' => now(), 
                'total_barang' => $totalBarang,
                'total_harga' => $totalHarga
            ]);

            foreach ($request->barang_id as $index => $barang_id) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'barang_id' => $barang_id,
                    'harga' => $request->harga[$index],
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

    private function hitungTotalHarga($request)
    {
        $total = 0;
        foreach ($request->harga as $index => $harga) {
            $total += $harga * $request->jumlah[$index];
        }
        return $total;
    }
}