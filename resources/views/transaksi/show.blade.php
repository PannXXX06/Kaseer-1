@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="px-4 py-6">
    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-yellow-500">
        <div class="bg-gray-700 px-6 py-4 border-b border-yellow-500">
            <h2 class="text-xl font-bold text-yellow-400">Detail Transaksi #{{ $transaksi->id }}</h2>
        </div>
        
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-gray-400"><strong>Tanggal:</strong></p>
                    <p class="text-gray-300">
                        @if($transaksi->tanggal instanceof \Carbon\Carbon)
                            {{ $transaksi->tanggal->format('d/m/Y H:i') }}
                        @else
                            {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d/m/Y H:i') }}
                        @endif
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-gray-400"><strong>Total Barang:</strong> <span class="text-gray-300">{{ $transaksi->total_barang }}</span></p>
                    <p class="text-gray-400"><strong>Total Harga:</strong> <span class="text-yellow-400">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span></p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-600">
                    <thead class="bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Kode Barang</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Nama Barang</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Harga Satuan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Jumlah</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($transaksi->detailTransaksis as $detail)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $detail->barang->kode_barang }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $detail->barang->nama_barang }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-yellow-400">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300 text-center">{{ $detail->jumlah }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-yellow-400">Rp {{ number_format($detail->harga * $detail->jumlah, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-700">
                        <tr>
                            <td colspan="5" class="px-6 py-3 text-right text-sm font-medium text-gray-300">TOTAL</td>
                            <td class="px-6 py-3 text-left text-sm font-bold text-yellow-400">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-6 pt-4 border-t border-gray-700">
                <a href="{{ route('transaksi.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-gray-300 rounded hover:bg-gray-500 transition">
                    <i class="bi bi-arrow-left mr-2"></i> Kembali ke Daftar Transaksi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection