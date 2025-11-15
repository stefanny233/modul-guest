<?php
namespace App\Http\Controllers;

use App\Models\LembagaDesa;
use Illuminate\Http\Request;

class LembagaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembaga = LembagaDesa::latest()->get();
        return view('pages.lembaga.index', compact('lembaga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daftarLembaga = [
        'Karang Taruna',
        'PKK Desa',
        'Badan Permusyawaratan Desa (BPD)',
        'LPM Desa',
        'Posyandu',
        'RT/RW',
        'BUMDes',
    ];
        return view('pages.lembaga.create', compact('daftarLembaga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:150',
            'deskripsi'    => 'nullable|string',
            'kontak'       => 'nullable|string|max:50',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('lembaga_desa', 'public');
        }

        LembagaDesa::create($data);

        return redirect()->route('lembaga.index')
            ->with('success', 'Data lembaga berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lembaga = LembagaDesa::where('lembaga_id', $id)->firstOrFail(); // <--- FIX
        return view('pages.lembaga.edit', compact('lembaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lembaga = LembagaDesa::where('lembaga_id', $id)->firstOrFail(); // <--- FIX
        $lembaga->update($request->all());

        return redirect()->route('lembaga.index')
            ->with('success', 'Data lembaga berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lembaga = LembagaDesa::where('lembaga_id', $id)->firstOrFail(); // <--- FIX
        $lembaga->delete();

        return redirect()->route('lembaga.index')
            ->with('success', 'Data lembaga berhasil dihapus!');
    }
}
