<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkat = PerangkatDesa::latest()->get();
        return view('pages.perangkat_desa.index', compact('perangkat'));
    }

    public function create()
    {
        return view('perangkat_desa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required',
            'jabatan' => 'required|string|max:100',
            'nip' => 'nullable|string|max:50',
            'kontak' => 'required|string|max:20',
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('perangkat_desa', 'public');
        }

        PerangkatDesa::create($data);

        return redirect()->route('perangkat_desa.index')
            ->with('success', 'Data perangkat desa berhasil disimpan!');
    }
}
