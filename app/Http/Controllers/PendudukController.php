<?php
namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Warga;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduk = Warga::all();
        return view('penduduk.index', compact('penduduk'));
    }

    public function create()
    {
        return view('penduduk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required',
            'nik'           => 'required|unique:penduduk|max:16',
            'alamat'        => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'pekerjaan'     => 'required',
        ]);

        Penduduk::create($request->all());

        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->update([
            'nama'   => $request->nama,
            'nik'    => $request->nik,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('penduduk.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        Penduduk::destroy($id);
        $penduduk->delete();

        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil dihapus!');
    }
}
