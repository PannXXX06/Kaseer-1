@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="px-4 py-6">
    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-yellow-500">
        <div class="bg-gray-700 px-6 py-4 border-b border-yellow-500">
            <h2 class="text-2xl font-bold text-yellow-400">Edit Barang</h2>
        </div>
        
        <div class="p-6">
            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="kode_barang" class="block text-sm font-medium text-gray-300 mb-1">Kode Barang</label>
                        <input type="text" name="kode_barang" id="kode_barang" 
                               class="w-full bg-gray-700 border border-gray-600 text-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-500" 
                               value="{{ old('kode_barang', $barang->kode_barang) }}" required>
                        @error('kode_barang')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="nama_barang" class="block text-sm font-medium text-gray-300 mb-1">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" 
                               class="w-full bg-gray-700 border border-gray-600 text-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-500" 
                               value="{{ old('nama_barang', $barang->nama_barang) }}" required>
                        @error('nama_barang')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="harga" class="block text-sm font-medium text-gray-300 mb-1">Harga</label>
                        <input type="number" name="harga" id="harga" min="0" 
                               class="w-full bg-gray-700 border border-gray-600 text-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-yellow-500" 
                               value="{{ old('harga', $barang->harga) }}" required>
                        @error('harga')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-gray-600 text-gray-300 rounded-lg hover:bg-gray-500 transition">
                            Batal
                        </a>
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-gray-900 rounded-lg hover:bg-yellow-400 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection