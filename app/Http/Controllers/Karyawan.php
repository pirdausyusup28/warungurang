<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\KaryawanModels;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Validation\Rule;

class Karyawan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $data = KaryawanModels::all();
        return response(view('karyawan.karyawan', compact('data')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'nik_karyawan' => 'required|unique:karyawan',
            'tgl_lahir_karyawan' => 'required|date',
            'jk_karyawan' => 'required|in:L,P',
            'no_hp_karyawan' => 'required|string|max:15',
            'alamat_karyawan' => 'required|string|max:255',
            'tgl_mulai_kerja_karyawan' => 'required|date',
            'photo' => 'required|image|max:2048',
            'status_karyawan' => 'required|in:K,T,M,NA',
        ], [
            'nik_karyawan.unique' => 'NIK karyawan sudah ada.',
        ]);

        // Cek apakah NIK karyawan sudah ada
        $existingKaryawan = KaryawanModels::where('nik_karyawan', $request->nik_karyawan)->first();
        if ($existingKaryawan) {
            return redirect()->back()->withErrors(['nik_karyawan' => 'NIK karyawan sudah ada'])->withInput();
        }

        // Upload gambar
        $photoPath = $request->file('photo')->store('photos', 'public');

        // Simpan data ke database
        $karyawan = new KaryawanModels;
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->nik_karyawan = $request->nik_karyawan;
        $karyawan->tgl_lahir_karyawan = $request->tgl_lahir_karyawan;
        $karyawan->jk_karyawan = $request->jk_karyawan;
        $karyawan->no_hp_karyawan = $request->no_hp_karyawan;
        $karyawan->alamat_karyawan = $request->alamat_karyawan;
        $karyawan->tgl_mulai_kerja_karyawan = $request->tgl_mulai_kerja_karyawan;
        $karyawan->photo = $photoPath;
        $karyawan->status_karyawan = $request->status_karyawan;
        $karyawan->save();

        return redirect()->route('karyawan')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id_karyawan'); // Mengambil id_karyawan dari input POST

        $request->validate([
            'nama_karyawan' => 'required',
            'tgl_lahir_karyawan' => 'required',
            'jk_karyawan' => 'required',
            'no_hp_karyawan' => 'required',
            'alamat_karyawan' => 'required',
            'tgl_mulai_kerja_karyawan' => 'required',
            'status_karyawan' => 'required',
        ]);

        $karyawan = KaryawanModels::findOrFail($id);
        
        $karyawan->update($request->all());

        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $karyawan = KaryawanModels::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
