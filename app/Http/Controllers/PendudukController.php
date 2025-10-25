<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $warga = Warga::all();
        return view('penduduk.index', compact('warga'));
    }

    public function create()
    {
        return view('penduduk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp'        => 'required|unique:warga,no_ktp',
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'pekerjaan'     => 'required',
            'telp'          => 'nullable',
            'email'         => 'nullable|email',
        ]);

        Warga::create($request->all());
        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('penduduk.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);
        $warga->update($request->all());
        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Warga::destroy($id);
        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil dihapus!');
    }
}
