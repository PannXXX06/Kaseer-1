<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $barang = [
            [
                'kode_barang' => 'BRG-001',
                'nama_barang' => 'Laptop ASUS X441UA',
                'harga' => 6500000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_barang' => 'BRG-002',
                'nama_barang' => 'Mouse Wireless Logitech M220',
                'harga' => 175000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_barang' => 'BRG-003',
                'nama_barang' => 'Keyboard Mechanical Fantech',
                'harga' => 350000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_barang' => 'BRG-004',
                'nama_barang' => 'Monitor LG 24 Inch',
                'harga' => 1800000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_barang' => 'BRG-005',
                'nama_barang' => 'Flashdisk Sandisk 32GB',
                'harga' => 85000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_barang' => 'BRG-006',
                'nama_barang' => 'Harddisk External 1TB',
                'harga' => 750000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_barang' => 'BRG-007',
                'nama_barang' => 'Webcam Logitech C920',
                'harga' => 950000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_barang' => 'BRG-008',
                'nama_barang' => 'Headset Gaming Rexus',
                'harga' => 250000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_barang' => 'BRG-009',
                'nama_barang' => 'Mousepad SteelSeries QcK',
                'harga' => 150000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_barang' => 'BRG-010',
                'nama_barang' => 'Router TP-Link Archer C6',
                'harga' => 450000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        Barang::insert($barang);
    }
}