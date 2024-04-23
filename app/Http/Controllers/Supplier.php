<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SupplierModels;

class Supplier extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SupplierModels::all();
        return response(view('supplier.supplier', compact('data')));
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
            'nama_supplier' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        $supplier = new SupplierModels;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->kontak = $request->kontak;
        $supplier->deskripsi = $request->deskripsi;
        $supplier->flag_status = 0;
        $supplier->save();

        return redirect()->route('supplier')->with('success', 'Data berhasil ditambahkan.');
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
        $id = $request->input('id_supplier'); // Mengambil id_su$supplier dari input POST

        $request->validate([
            'nama_supplier' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
        ]);

        $supplier = SupplierModels::findOrFail($id);
        
        $supplier->update($request->all());

        return redirect()->route('supplier')->with('success', 'Data supplier berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = SupplierModels::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier')->with('success', 'Data berhasil dihapus.');
    }
}
