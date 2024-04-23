<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\BarangModels;
use App\Models\SupplierModels;

class Barang extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BarangModels::with('supplier')->get();
        $supplier = SupplierModels::all();
        return response(view('barang.barang', compact('data','supplier')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kd_barang' => 'required|unique:kxs_master_barang',
            'kategori_barang' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'supplier_id' => 'required|string|max:255',
            'satuan_barang' => 'required|string|max:255',
            'harga_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'gambar' => 'required|image|max:2048',
        ], [
            'kd_barang.unique' => 'Kode Barang sudah ada.',
        ]);

        // Cek apakah NIK karyawan sudah ada
        $existingKodebarang = BarangModels::where('kd_barang', $request->kd_barang)->first();
        if ($existingKodebarang) {
            return redirect()->back()->withErrors(['kd_barang' => 'Kode Barang sudah ada'])->withInput();
        }

        // Upload gambar
        $gambarPath = $request->file('gambar')->store('barang', 'public');

        // Simpan data ke database
        $barang = new BarangModels;
        $barang->kd_barang = $request->kd_barang;
        $barang->kategori_barang = $request->kategori_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->supplier_id = $request->supplier_id;
        $barang->satuan_barang = $request->satuan_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->gambar = $gambarPath;
        $barang->flag_status = 0;
        $barang->save();

        return redirect()->route('barang')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id_barang');

        $request->validate([
            'kategori_barang' => 'required',
            'nama_barang' => 'required',
            'supplier_id' => 'required',
            'satuan_barang' => 'required',
            'harga_barang' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);

        // Membuat direktori jika belum ada
        if (!Storage::exists('public/barang')) {
            Storage::makeDirectory('public/barang');
        }

        $gambarPath = $request->file('gambar')->store('barang', 'public');

        $barang = BarangModels::findOrFail($id);
        $barang->gambar = $gambarPath;
        
        $barang->update($request->except('gambar'));

        return redirect()->route('barang')->with('success', 'Data berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = BarangModels::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang')->with('success', 'Data berhasil dihapus.');
    }
}
