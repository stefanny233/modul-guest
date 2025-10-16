<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\Warga;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $data = PerangkatDesa::with('warga')->get();
        return view('perangkat_desa.index', compact('data'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('perangkat_desa.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required',
            'jabatan' => 'required|string|max:100',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('perangkat_desa', 'public');
        }

        PerangkatDesa::create($data);

        return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);
        $warga = Warga::all();
        return view('perangkat_desa.edit', compact('perangkat', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'warga_id' => 'required',
            'jabatan' => 'required|string|max:100',
        ]);

        $perangkat = PerangkatDesa::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('perangkat_desa', 'public');
        }

        $perangkat->update($data);
        return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        PerangkatDesa::destroy($id);
        return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil dihapus!');
    }
}
