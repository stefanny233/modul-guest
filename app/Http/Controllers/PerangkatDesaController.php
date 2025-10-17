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
        $validated = $request->validate([
            'warga_id'        => 'required|exists:warga,warga_id',
            'jabatan'         => 'required|string|max:100',
            'kontak'          => 'required|string|max:50',
            'periode_mulai'   => 'required|date',
            'periode_selesai' => 'required|date|after:periode_mulai',
        ]);

        PerangkatDesa::create($validated);
        return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil disimpan!');

    }

    public function edit($id)
    {
        $data  = PerangkatDesa::findOrFail($id);
        $warga = Warga::all();
        return view('perangkat_desa.edit', compact('data', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'warga_id'        => 'required|exists:warga,warga_id',
            'jabatan'         => 'required|string|max:100',
            'kontak'          => 'required|string|max:50',
            'periode_mulai'   => 'required|date',
            'periode_selesai' => 'required|date|after:periode_mulai',
        ]);

        $data = PerangkatDesa::findOrFail($id);
        $data->update($validated);

        return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        PerangkatDesa::findOrFail($id)->delete();
        return redirect()->route('perangkat_desa.index')
            ->with('success', 'Data perangkat desa berhasil dihapus!');
    }
}
