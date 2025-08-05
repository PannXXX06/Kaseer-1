<?php

namespace Database\Factories;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    public function definition()
    {
        return [
            'tanggal' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'total_barang' => 0, 
            'total_harga' => 0,  
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}