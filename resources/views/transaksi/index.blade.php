@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="px-4 py-6">
    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-yellow-500">
        <div class="bg-gray-700 px-6 py-4 border-b border-yellow-500 flex justify-between items-center">
            <h2 class="text-xl font-bold text-yellow-400">Daftar Transaksi</h2>
            <a href="{{ route('kasir.index') }}" class="flex items-center px-3 py-1 bg-yellow-500 text-gray-900 rounded hover:bg-yellow-400 transition">
                <i class="bi bi-cash-stack mr-2"></i> Ke Kasir
            </a>
        </div>
        
        <div class="p-6">
            <!-- Form Filter Tanggal -->
            <form action="{{ route('transaksi.index') }}" method="GET" class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    <div class="md:col-span-3">
                        <label for="start_date" class="block text-sm font-medium text-gray-300 mb-1">Dari Tanggal</label>
                        <input type="date" 
                               class="w-full bg-gray-700 border border-gray-600 text-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-500" 
                               id="start_date" 
                               name="start_date" 
                               value="{{ request('start_date') }}" 
                               max="{{ date('Y-m-d') }}">
                    </div>
                    <div class="md:col-span-3">
                        <label for="end_date" class="block text-sm font-medium text-gray-300 mb-1">Sampai Tanggal</label>
                        <input type="date" 
                               class="w-full bg-gray-700 border border-gray-600 text-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-500" 
                               id="end_date" 
                               name="end_date" 
                               value="{{ request('end_date') }}" 
                               max="{{ date('Y-m-d') }}">
                    </div>
                    <div class="md:col-span-4 flex space-x-2">
                        <button type="submit" class="px-3 py-2 bg-yellow-500 text-gray-900 rounded hover:bg-yellow-400 transition flex items-center">
                            <i class="bi bi-filter mr-2"></i> Filter
                        </button>
                        <a href="{{ route('transaksi.index') }}" class="px-3 py-2 bg-gray-600 text-gray-300 rounded hover:bg-gray-500 transition flex items-center">
                            <i class="bi bi-arrow-counterclockwise mr-2"></i> Reset
                        </a>
                    </div>
                    <div class="md:col-span-2">
                        <div class="bg-gray-700 p-2 rounded border border-gray-600 text-right">
                            <p class="text-xs text-gray-400">Total Transaksi:</p>
                            <p class="font-bold text-yellow-400">{{ $transaksis->total() }}</p>
                        </div>
                    </div>
                </div>
            </form>

            @if($transaksis->isEmpty())
            <div class="bg-gray-700 border-l-4 border-yellow-500 p-4">
                <div class="flex items-center">
                    <i class="bi bi-exclamation-triangle text-yellow-500 mr-2"></i>
                    <span class="text-gray-300">Tidak ada data transaksi</span>
                </div>
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-600">
                    <thead class="bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Total Barang</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Total Harga</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($transaksis as $transaksi)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                {{ ($transaksis->currentPage() - 1) * $transaksis->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                {{ $transaksi->tanggal->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                {{ $transaksi->total_barang }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-yellow-400">
                                Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('transaksi.show', $transaksi->id) }}" 
                                   class="inline-flex items-center px-3 py-1 bg-gray-600 text-gray-300 rounded hover:bg-gray-500 transition">
                                    <i class="bi bi-eye mr-1"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center mt-6 border-t border-gray-700 pt-4">
                <div class="text-sm text-gray-400 mb-4 md:mb-0">
                    Menampilkan <span class="font-medium text-yellow-400">{{ $transaksis->firstItem() }}</span> sampai 
                    <span class="font-medium text-yellow-400">{{ $transaksis->lastItem() }}</span> dari 
                    <span class="font-medium text-yellow-400">{{ $transaksis->total() }}</span> transaksi
                </div>
                <div class="flex space-x-1">
                    {{ $transaksis->appends(request()->query())->links('vendor.pagination.tailwind') }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection