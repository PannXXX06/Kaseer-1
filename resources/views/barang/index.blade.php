@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="px-4 py-6">
    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-yellow-500">
        <div class="bg-gray-700 px-6 py-4 border-b border-yellow-500 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-yellow-400">Daftar Barang</h2>
            <a href="{{ route('barang.create') }}" class="flex items-center px-4 py-2 bg-yellow-500 text-gray-900 rounded-lg hover:bg-yellow-400 transition">
                <i class="bi bi-plus-circle mr-2"></i> Tambah Barang
            </a>
        </div>
        
        <div class="p-6">
            <form action="{{ route('barang.index') }}" method="GET" class="mb-6">
                <div class="flex">
                    <input type="text" name="search" placeholder="Cari berdasarkan kode/nama barang..." 
                           class="flex-grow bg-gray-700 border border-gray-600 text-gray-300 rounded-l px-4 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-500" 
                           value="{{ request('search') }}">
                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-gray-900 rounded-r hover:bg-yellow-400 transition">
                        <i class="bi bi-search"></i>
                    </button>
                    @if(request('search'))
                    <a href="{{ route('barang.index') }}" class="ml-2 px-4 py-2 bg-gray-600 text-gray-300 rounded hover:bg-gray-500 transition">
                        Reset
                    </a>
                    @endif
                </div>
            </form>

            @if($barang->isEmpty())
            <div class="bg-gray-700 border-l-4 border-yellow-500 p-4">
                <div class="flex items-center">
                    <i class="bi bi-exclamation-triangle text-yellow-500 mr-2"></i>
                    <span class="text-gray-300">Tidak ada barang tersedia. Silakan tambahkan barang terlebih dahulu.</span>
                </div>
            </div>
            @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-600">
                    <thead class="bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Kode</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Nama Barang</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Harga</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($barang as $item)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ ($barang->currentPage() - 1) * $barang->perPage() + $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $item->kode_barang }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $item->nama_barang }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-yellow-400">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{ route('barang.edit', $item->id) }}" class="text-yellow-400 hover:text-yellow-300" title="Edit">
                                        <i class="bi bi-pencil-square text-lg"></i>
                                    </a>
                                    <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                            <i class="bi bi-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center mt-6 border-t border-gray-700 pt-4">
                <div class="text-sm text-gray-400 mb-4 md:mb-0">
                    Menampilkan <span class="font-medium text-yellow-400">{{ $barang->firstItem() }}</span> sampai 
                    <span class="font-medium text-yellow-400">{{ $barang->lastItem() }}</span> dari 
                    <span class="font-medium text-yellow-400">{{ $barang->total() }}</span> barang
                </div>
                <div class="flex space-x-1">
                    {{ $barang->appends(request()->query())->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection