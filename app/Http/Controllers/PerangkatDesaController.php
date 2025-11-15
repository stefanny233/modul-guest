<?php
namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use App\Models\Warga;
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
        $daftarJabatan = [
            'Kepala Desa',
            'Sekretaris Desa',
            'Kaur Keuangan',
            'Kaur Umum',
            'Kasi Pemerintahan',
            'Kasi Kesejahteraan',
            'Kasi Pelayanan',
            'Kepala Dusun',
            'Staff Desa',
        ];

        $warga = Warga::all();

        // FIX: tambah $warga ke compact
        return view('pages.perangkat_desa.create', compact('daftarJabatan', 'warga'));
    }

    public function show()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan'         => 'required|string|max:100',
            'nip'             => 'nullable|string|max:50',
            'kontak'          => 'required|string|max:20',
            'periode_mulai'   => 'required|date',
            'periode_selesai' => 'nullable|date',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'jabatan',
            'nip',
            'kontak',
            'periode_mulai',
            'periode_selesai',
        ]);

        $data['warga_id'] = 1;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('perangkat_desa', 'public');
        }

        PerangkatDesa::create($data);

        return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);
        $warga     = Warga::all();

        return view('pages.perangkat_desa.edit', compact('perangkat', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan'         => 'required|string|max:100',
            'nip'             => 'nullable|string|max:50',
            'kontak'          => 'required|string|max:20',
            'periode_mulai'   => 'required|date',
            'periode_selesai' => 'nullable|date',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'warga_id'        => 'required',
        ]);

        $perangkat = PerangkatDesa::findOrFail($id);

        $data = $request->only([
            'jabatan',
            'nip',
            'kontak',
            'periode_mulai',
            'periode_selesai',
            'warga_id',
        ]);

        if ($request->hasFile('foto')) {

            // Hapus foto lama jika ada
            if ($perangkat->foto && Storage::disk('public')->exists($perangkat->foto)) {
                Storage::disk('public')->delete($perangkat->foto);
            }
            $validated['foto'] = $request->file('foto')->store('perangkat', 'public');
    }

            $perangkat->update($data);

            return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil diupdate!');
        }

        public function destroy($id)
        {
            $perangkat = PerangkatDesa::findOrFail($id);

            // Hapus foto lama kalau ada
            if ($perangkat->foto) {
                Storage::delete('public/' . $perangkat->foto);
            }

            // Hapus datanya
            $perangkat->delete();

            return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil dihapus');
        }

    }
