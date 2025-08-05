<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        $transaksis = Transaksi::factory(10)->create();

        $transaksis->each(function ($transaksi) {
            $barangIds = \App\Models\Barang::inRandomOrder()
                ->limit(rand(1, 5))
                ->pluck('id')
                ->toArray();

            $total_barang = 0;
            $total_harga = 0;

            foreach ($barangIds as $barangId) {
                $barang = \App\Models\Barang::find($barangId);
                $jumlah = rand(1, 3);
                $harga = $barang->harga;

                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'barang_id' => $barangId,
                    'harga' => $harga,
                    'jumlah' => $jumlah
                ]);

                $total_barang += $jumlah;
                $total_harga += ($harga * $jumlah);
            }

            $transaksi->update([
                'total_barang' => $total_barang,
                'total_harga' => $total_harga
            ]);
        });
    }
}