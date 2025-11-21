<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rw;
use App\Models\Warga;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil data RW, eager-load ketua (relasi)
        $rws = Rw::with('ketua')->paginate(15);

        // compact harus sesuai nama variabel ($rws)
        return view('rw.index', compact('rws'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wargas = Warga::select('id', 'nama')->get();
        return view('rw.create', compact('wargas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_rw'          => 'required|unique:rw,nomor_rw',
            'ketua_rw_warga_id' => 'nullable|exists:warga,id',
        ]);

        Rw::create($request->only('nomor_rw', 'ketua_rw_warga_id', 'keterangan'));

        return redirect()->route('rw.index')->with('success', 'RW berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rw $rw)
    {
        // jika butuh tampilan detail RW
        return view('rw.show', compact('rw'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rw $rw)
    {
        $wargas = Warga::select('id', 'nama')->get();
        return view('rw.edit', compact('rw', 'wargas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rw $rw)
    {
        $request->validate([
            // unique: table, column, exceptId, idColumn
            'nomor_rw'          => 'required|unique:rw,nomor_rw,' . $rw->rw_id . ',rw_id',
            'ketua_rw_warga_id' => 'nullable|exists:warga,id',
        ]);

        $rw->update($request->only('nomor_rw', 'ketua_rw_warga_id', 'keterangan'));

        return redirect()->route('rw.index')->with('success', 'RW berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rw $rw)
    {
        $rw->delete();
        return redirect()->route('rw.index')->with('success', 'RW berhasil dihapus.');
    }
}
