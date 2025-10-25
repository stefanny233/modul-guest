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
            'nama'          => 'required|string|max:255',
            'nik'           => 'required|numeric|unique:warga',
            'alamat'        => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
        ]);

        warga::create($request->all());

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

        $request->validate([
            'nama' => 'required|string|max:255',
            'nik'  => "required|numeric|unique:warga,nik,{$warga->id}",
            'alamat'        => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
        ]);

        $warga->update($request->all());
        return redirect()->route('penduduk.index')->with('success', 'Data warga berhasil diupdate!');
    }

    public function destroy($id)
    {
        Warga::destroy($id);
        return redirect()->route('penduduk.index')->with('success', 'Data warga berhasil dihapus!');
    }
}
