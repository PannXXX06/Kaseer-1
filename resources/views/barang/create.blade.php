@extends('layouts.app')

@section('title', isset($barang) ? 'Edit Barang' : 'Tambah Barang')

@section('content')
<div class="px-4 py-6">
    <div class="max-w-2xl mx-auto">
        @if(session('success'))
        <div class="bg-green-800 border-l-4 border-green-500 p-4 mb-4">
            <div class="flex items-center">
                <i class="bi bi-check-circle-fill text-green-400 mr-2"></i>
                <span class="text-gray-300">{{ session('success') }}</span>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-800 border-l-4 border-red-500 p-4 mb-4">
            <div class="flex items-center">
                <i class="bi bi-exclamation-triangle-fill text-red-400 mr-2"></i>
                <span class="text-gray-300">{{ session('error') }}</span>
            </div>
        </div>
        @endif

        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-yellow-500">
            <div class="bg-gray-700 px-6 py-4 border-b border-yellow-500">
                <h2 class="text-xl font-bold text-yellow-400">{{ isset($barang) ? 'Edit' : 'Tambah' }} Barang</h2>
            </div>
            
            <div class="p-6">
                <form action="{{ isset($barang) ? route('barang.update', $barang->id) : route('barang.store') }}" method="POST">
                    @csrf
                    @if(isset($barang))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label for="kode_barang" class="block text-sm font-medium text-gray-300 mb-2">Kode Barang</label>
                        <input type="text" 
                               class="w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('kode_barang') border-red-500 @enderror" 
                               id="kode_barang" 
                               name="kode_barang" 
                               value="{{ old('kode_barang', $barang->kode_barang ?? '') }}" 
                               required>
                        @error('kode_barang')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_barang" class="block text-sm font-medium text-gray-300 mb-2">Nama Barang</label>
                        <input type="text" 
                               class="w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('nama_barang') border-red-500 @enderror" 
                               id="nama_barang" 
                               name="nama_barang" 
                               value="{{ old('nama_barang', $barang->nama_barang ?? '') }}" 
                               required>
                        @error('nama_barang')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="harga" class="block text-sm font-medium text-gray-300 mb-2">Harga</label>
                        <input type="number" 
                               class="w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 @error('harga') border-red-500 @enderror" 
                               id="harga" 
                               name="harga" 
                               min="0" 
                               value="{{ old('harga', $barang->harga ?? 0) }}" 
                               required>
                        @error('harga')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-gray-600 text-gray-300 rounded-lg hover:bg-gray-500 transition">
                            Kembali
                        </a>
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-gray-900 rounded-lg hover:bg-yellow-400 transition">
                            {{ isset($barang) ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="fixed inset-0 z-50 hidden" id="successModal" aria-modal="true">
    <div class="fixed inset-0 bg-black bg-opacity-75"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-gray-800 rounded-lg shadow-xl w-full max-w-md border-2 border-yellow-500">
            <div class="bg-gray-700 px-6 py-4 border-b border-yellow-500 rounded-t-lg">
                <div class="flex items-center">
                    <i class="bi bi-check-circle-fill text-green-400 text-xl mr-2"></i>
                    <h3 class="text-lg font-bold text-yellow-400">Sukses</h3>
                </div>
            </div>
            <div class="p-6">
                <p class="text-gray-300" id="successMessage"></p>
            </div>
            <div class="px-6 py-4 border-t border-gray-700 flex justify-end">
                <button id="redirectButton" class="px-4 py-2 bg-yellow-500 text-gray-900 rounded-lg hover:bg-yellow-400 transition">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>

<div class="fixed inset-0 z-50 hidden" id="errorModal" aria-modal="true">
    <div class="fixed inset-0 bg-black bg-opacity-75"></div>
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-gray-800 rounded-lg shadow-xl w-full max-w-md border-2 border-yellow-500">
            <div class="bg-gray-700 px-6 py-4 border-b border-yellow-500 rounded-t-lg">
                <div class="flex items-center">
                    <i class="bi bi-exclamation-triangle-fill text-red-400 text-xl mr-2"></i>
                    <h3 class="text-lg font-bold text-yellow-400">Gagal</h3>
                </div>
            </div>
            <div class="p-6">
                <p class="text-gray-300" id="errorMessage"></p>
            </div>
            <div class="px-6 py-4 border-t border-gray-700 flex justify-end">
                <button class="px-4 py-2 bg-gray-600 text-gray-300 rounded-lg hover:bg-gray-500 transition" onclick="document.getElementById('errorModal').classList.add('hidden')">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            document.getElementById('successMessage').textContent = "{{ session('success') }}";
            document.getElementById('successModal').classList.remove('hidden');
            
            document.getElementById('redirectButton').addEventListener('click', function() {
                window.location.href = "{{ route('barang.index') }}";
            });
        @endif

        @if(session('error'))
            document.getElementById('errorMessage').textContent = "{{ session('error') }}";
            document.getElementById('errorModal').classList.remove('hidden');
        @endif
    });
</script>
@endsection
@endsection