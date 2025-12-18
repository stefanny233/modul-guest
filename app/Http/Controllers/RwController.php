<?php
namespace App\Http\Controllers;

use App\Models\Rw;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q       = $request->input('q');
        $perPage = (int) $request->input('per_page', 15);
        $allowed = [6, 9, 12, 15, 24];
        if (! in_array($perPage, $allowed)) {
            $perPage = 15;
        }

        $query = Rw::query();

        if ($q) {
            $query->where('nomor_rw', 'like', "%{$q}%")
                ->orWhere('keterangan', 'like', "%{$q}%");
        }

        $rws = $query->orderBy('rw_id', 'asc')->paginate($perPage)->withQueryString();

        return view('pages.Rw.index', compact('rws'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Rw.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nomor_rw'          => 'nullable|string|max:50',
            'ketua_rw_warga_id' => 'nullable|exists:warga,id',
            'keterangan'        => 'nullable|string',
        ]);

        Rw::create($data);
        return redirect()->route('rw.index')->with('success', 'RW berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rw $rw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rw $rw)
    {
        return view('pages.Rw.edit', compact('rw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rw $rw)
    {
        $data = $request->validate([
            'nomor_rw'          => 'nullable|string|max:50',
            'ketua_rw_warga_id' => 'nullable|exists:warga,id',
            'keterangan'        => 'nullable|string',
        ]);

        $rw->update($data);
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
