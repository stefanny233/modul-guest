<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\Warga; // Kita panggil Warga (sesuai file aslimu)
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        // Kita panggil relasi 'warga' (bukan 'penduduk')
        $data = PerangkatDesa::with('warga')->get();

        return view('perangkat_desa.index', compact('data'));
    }

    public function create()
    {
        // Kita ambil data Warga (bukan Penduduk)
        $warga = Warga::all();

        return view('perangkat_desa.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Pastikan tabel warga-mu primary key-nya 'id'
            'warga_id' => 'required|exists:warga,id|unique:perangkat_desa,warga_id',
            'jabatan' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'periode_mulai' => 'nullable|date',
            'periode_selesai' => 'nullable|date',
        ]);

        PerangkatDesa::create($request->all());

        return redirect()->route('perangkat_desa.index')
                         ->with('success', 'Perangkat desa berhasil ditambahkan!');
    }

    // Kita pakai Route Model Binding.
    // Laravel otomatis mencari PerangkatDesa berdasarkan ID di URL
    public function edit(PerangkatDesa $perangkat_desa)
    {
        $warga = Warga::all(); // Ambil data warga untuk dropdown

        return view('perangkat_desa.edit', [
            'perangkat' => $perangkat_desa, // $perangkat_desa adalah data yg mau diedit
            'warga' => $warga
        ]);
    }

    // Kita pakai Route Model Binding
    public function update(Request $request, PerangkatDesa $perangkat_desa)
    {
        $request->validate([
             // unik KECUALI untuk dirinya sendiri ($perangkat_desa->id)
            'warga_id' => 'required|exists:warga,id|unique:perangkat_desa,warga_id,' . $perangkat_desa->id,
            'jabatan' => 'required|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'periode_mulai' => 'nullable|date',
            'periode_selesai' => 'nullable|date',
        ]);

        $perangkat_desa->update($request->all());

        return redirect()->route('perangkat_desa.index')
                         ->with('success', 'Data perangkat desa berhasil diperbarui.');
    }

    // Kita pakai Route Model Binding
    public function destroy(PerangkatDesa $perangkat_desa)
    {
        $perangkat_desa->delete();

        return redirect()->route('perangkat_desa.index')
                         ->with('success', 'Data perangkat desa berhasil dihapus.');
    }
}

