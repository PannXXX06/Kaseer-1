@extends('layouts.app')

@section('title', 'Kasir POS')

@section('content')
<div class="px-4 py-6">
    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden border border-yellow-500">
        <div class="bg-gray-700 px-6 py-4 border-b border-yellow-500 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-yellow-400">KASIR</h2>
            
            <div class="flex space-x-2">
                <a href="{{ route('transaksi.index') }}" class="flex items-center px-3 py-1 bg-gray-600 text-yellow-400 rounded hover:bg-gray-500 transition">
                    <i class="bi bi-clock-history mr-2"></i> History
                </a>
                <a href="{{ route('barang.create') }}" class="flex items-center px-3 py-1 bg-yellow-500 text-gray-900 rounded hover:bg-yellow-400 transition">
                    <i class="bi bi-plus-circle mr-2"></i> Tambah Barang
                </a>
            </div>
        </div>
        
            <div class="p-6">

                <form action="{{ route('kasir.checkout') }}" method="POST" id="formTransaksi">
                    @csrf
                    <input type="hidden" name="total_harga" id="totalHargaHidden">
                    
                    <div class="flex flex-col lg:flex-row gap-6">
                        <!-- Daftar Barang -->
                        <div class="lg:w-7/12">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-yellow-400">Daftar Barang</h3>
                                <span class="bg-gray-700 text-yellow-400 px-2 py-1 rounded text-sm">
                                    {{ $barang->total() }} Barang Tersedia
                                </span>
                            </div>
                            
                            @if($barang->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-600">
                                    <thead class="bg-gray-700">
                                        <tr>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Pilih</th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Kode</th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Nama Barang</th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Harga</th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-yellow-400 uppercase tracking-wider">Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                                        @foreach($barang as $item)
                                        <tr class="hover:bg-gray-700 transition">
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <input type="checkbox" name="barang_id[]" 
                                                    value="{{ $item->id }}" 
                                                    class="barang-checkbox h-4 w-4 text-yellow-500 border-gray-600 rounded bg-gray-700 focus:ring-yellow-500 focus:ring-offset-gray-800">
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-gray-300">{{ $item->kode_barang }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-gray-300">{{ $item->nama_barang }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-yellow-400">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <input type="number" name="jumlah[]" 
                                                    class="qty-input w-16 bg-gray-700 border border-gray-600 text-gray-300 rounded px-2 py-1 focus:outline-none focus:ring-1 focus:ring-yellow-500" 
                                                    min="1" value="1" disabled>
                                                <input type="hidden" name="harga[]" value="{{ $item->harga }}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex flex-col md:flex-row justify-between items-center mt-4 border-t border-gray-700 pt-4">
                                <div class="text-sm text-gray-400 mb-4 md:mb-0">
                                    Menampilkan <span class="font-medium text-yellow-400">{{ $barang->firstItem() }}</span> sampai 
                                    <span class="font-medium text-yellow-400">{{ $barang->lastItem() }}</span> dari 
                                    <span class="font-medium text-yellow-400">{{ $barang->total() }}</span> barang
                                </div>
                                <div class="flex space-x-1">
                                    {{ $barang->appends(request()->query())->links() }}
                                </div>
                            </div>
                            @else
                            <div class="bg-gray-700 border-l-4 border-yellow-500 p-4">
                                <div class="flex items-center">
                                    <i class="bi bi-exclamation-triangle text-yellow-500 mr-2"></i>
                                    <span class="text-gray-300">Tidak ada barang tersedia. Silakan tambahkan barang terlebih dahulu.</span>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="lg:w-5/12">
                            <div class="bg-gray-800 rounded-lg border border-yellow-500 overflow-hidden">
                                <div class="bg-gray-700 px-4 py-3 border-b border-yellow-500">
                                    <h3 class="text-lg font-semibold text-yellow-400">Ringkasan Belanja</h3>
                                </div>
                                <div class="p-4">
                                    <div id="ringkasan" class="min-h-[200px]">
                                        <p class="text-gray-400">Pilih barang terlebih dahulu</p>
                                    </div>
                                    <hr class="border-gray-600 my-3">
                                    <button type="button" id="btnBayar" disabled
                                        class="w-full bg-gray-700 hover:bg-yellow-500 hover:text-gray-900 text-yellow-400 py-3 px-4 rounded-lg font-bold transition disabled:opacity-50 disabled:cursor-not-allowed">
                                        <i class="bi bi-cash-stack mr-2"></i> LANJUT PEMBAYARAN
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="fixed inset-0 z-50 hidden" id="pembayaranModal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-black bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="relative bg-gray-800 rounded-lg shadow-xl w-full max-w-4xl border-2 border-yellow-500">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b border-yellow-500 bg-gray-700 rounded-t-lg">
                <h3 class="text-xl font-bold text-yellow-400">PROSES PEMBAYARAN</h3>
                <button type="button" id="closeModal" class="text-gray-400 hover:text-yellow-400">
                    <i class="bi bi-x-lg text-xl"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            
            <div class="p-4 md:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-lg font-semibold text-yellow-400 mb-3">Detail Belanja</h4>
                        <div id="detailBelanjaModal" class="min-h-[100px]"></div>
                        <hr class="border-gray-600 my-3">
                        <div class="flex justify-between font-bold text-lg">
                            <span class="text-gray-300">TOTAL</span>
                            <span id="totalBelanjaModal" class="text-yellow-400">Rp 0</span>
                        </div>
                    </div>
                    
                    <div>
                        <div class="mb-4">
                            <label for="uangPembeli" class="block text-sm font-medium text-gray-300 mb-2">Uang Pembeli</label>
                            <input type="text" 
                                   class="w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-500" 
                                   id="uangPembeli" 
                                   inputmode="numeric" 
                                   pattern="[0-9.]*" 
                                   required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300 mb-2">Kembalian</label>
                            <div class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-xl font-bold" id="kembalianText">
                                Rp 0
                            </div>
                        </div>
                        
                        <button type="button" id="btnProsesTransaksi"
                                class="w-full bg-yellow-500 hover:bg-yellow-400 text-gray-900 py-3 px-4 rounded-lg font-bold transition-colors duration-200">
                            <i class="bi bi-check-circle mr-2"></i> PROSES TRANSAKSI
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');
    let searchTimeout;
    
    function submitSearch() {
        clearTimeout(searchTimeout);
        searchForm.submit();
    }
    
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(submitSearch, 500); 
    });
    
    document.getElementById('searchButton').addEventListener('click', submitSearch);
    
    searchForm.addEventListener('submit', function(e) {
        if (searchInput.value.trim() === '') {
                e.preventDefault();
                window.location.href = "{{ route('kasir.index') }}";
            }
        });
    });
    const pembayaranModal = document.getElementById('pembayaranModal');
    const closeModalBtn = document.getElementById('closeModal');
    let totalBelanja = 0;
    let selectedItems = [];

    // Toggle modal
    function toggleModal(show) {
        pembayaranModal.classList.toggle('hidden', !show);
        document.body.style.overflow = show ? 'hidden' : '';
    }

    closeModalBtn.addEventListener('click', () => toggleModal(false));
    document.querySelector('.bg-opacity-75').addEventListener('click', () => toggleModal(false));

    function formatRupiah(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function unformatRupiah(rupiah) {
        return parseInt(rupiah.replace(/\./g, ''));
    }

    function updateRingkasan() {
        let html = '';
        totalBelanja = 0;
        selectedItems = [];
        
        document.querySelectorAll('.barang-checkbox:checked').forEach((checkbox, index) => {
            const row = checkbox.closest('tr');
            const barangId = checkbox.value;
            const nama = row.querySelector('td:nth-child(3)').textContent;
            const harga = parseInt(row.querySelector('input[name="harga[]"]').value);
            const qty = parseInt(row.querySelector('.qty-input').value);
            const subtotal = harga * qty;
            
            selectedItems.push({
                id: barangId,
                nama,
                harga,
                qty,
                subtotal
            });
            
            html += `
                <div class="flex justify-between mb-2">
                    <span class="text-gray-300">${nama} (${qty}x)</span>
                    <span class="text-yellow-400">Rp ${formatRupiah(subtotal)}</span>
                </div>
            `;
            
            totalBelanja += subtotal;
        });

        if (selectedItems.length > 0) {
            html += `
                <hr class="border-gray-600 my-2">
                <div class="flex justify-between font-bold">
                    <span class="text-gray-300">TOTAL</span>
                    <span class="text-yellow-400">Rp ${formatRupiah(totalBelanja)}</span>
                </div>
            `;
            document.getElementById('btnBayar').disabled = false;
            document.getElementById('totalHargaHidden').value = totalBelanja;
        } else {
            html = '<p class="text-gray-400">Pilih barang terlebih dahulu</p>';
            document.getElementById('btnBayar').disabled = true;
        }

        document.getElementById('ringkasan').innerHTML = html;
    }

    document.getElementById('btnBayar').addEventListener('click', function() {
        document.getElementById('detailBelanjaModal').innerHTML = 
            document.getElementById('ringkasan').innerHTML;
        document.getElementById('totalBelanjaModal').textContent = 
            `Rp ${formatRupiah(totalBelanja)}`;
        
        document.getElementById('uangPembeli').value = '';
        document.getElementById('kembalianText').textContent = 'Rp 0';
        document.getElementById('kembalianText').classList.remove('text-green-500', 'text-red-500');
        
        toggleModal(true);
    });

    document.getElementById('uangPembeli').addEventListener('input', function() {
        const start = this.selectionStart;
        const end = this.selectionEnd;
        
        let value = this.value.replace(/[^\d]/g, '');
        
        if (value.length > 0) {
            value = parseInt(value).toString();
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        
        this.value = value;
        
        this.setSelectionRange(start, end);
        
        const uangPembeli = value ? unformatRupiah(value) : 0;
        const kembalian = uangPembeli - totalBelanja;
        
        document.getElementById('kembalianText').textContent = 
            `Rp ${formatRupiah(kembalian)}`;
        
        const kembalianElement = document.getElementById('kembalianText');
        if (kembalian < 0) {
            kembalianElement.classList.add('text-red-500');
            kembalianElement.classList.remove('text-green-500');
        } else {
            kembalianElement.classList.add('text-green-500');
            kembalianElement.classList.remove('text-red-500');
        }
    });

    document.getElementById('btnProsesTransaksi').addEventListener('click', function() {
        const uangPembeliInput = document.getElementById('uangPembeli');
        const uangPembeli = uangPembeliInput.value ? unformatRupiah(uangPembeliInput.value) : 0;
        
        if (uangPembeli < totalBelanja) {
            alert('Uang pembeli tidak cukup!');
            return;
        }
        
        document.getElementById('formTransaksi').submit();
    });

    document.querySelectorAll('.barang-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const qtyInput = this.closest('tr').querySelector('.qty-input');
            qtyInput.disabled = !this.checked;
            updateRingkasan();
        });
    });

    document.querySelectorAll('.qty-input').forEach(input => {
        input.addEventListener('input', updateRingkasan);
    });

    updateRingkasan();
</script>
@endsection