<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $search = request('search');
        $barang = Barang::when($search, function($query) use ($search) {
                    return $query->where('nama_barang', 'like', '%'.$search.'%')
                                ->orWhere('kode_barang', 'like', '%'.$search.'%');
                })
                ->paginate(10)
                ->withQueryString();

        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs',
            'nama_barang' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0'
        ]);

        try {
            Barang::create([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga
            ]);

            return redirect()->route('barang.index')
                ->with('success', 'Barang berhasil ditambahkan!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambahkan barang: '.$e->getMessage())
                        ->withInput();
        }
    }
    
    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang,'.$barang->id,
            'nama_barang' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0'
        ]);

        try {
            $barang->update([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga
            ]);

            return redirect()->route('barang.index')
                ->with('success', 'Barang berhasil diperbarui!');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui barang: '.$e->getMessage())
                        ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        try {
            $barang->delete();
            return redirect()->route('barang.index')
                ->with('success', 'Barang berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')
                ->with('error', 'Gagal menghapus barang: '.$e->getMessage());
        }
    }
}