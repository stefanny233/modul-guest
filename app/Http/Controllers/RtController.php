<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rts = Rt::with(['rw', 'ketua'])->paginate(15);
        return view('rt.index', compact('rts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rws    = Rw::select('rw_id', 'nomor_rw')->get();
        $wargas = Warga::select('id', 'nama')->get();
        return view('rt.create', compact('rws', 'wargas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rw_id'             => 'required|exists:rw,rw_id',
            'nomor_rt'          => 'required',
            'ketua_rt_warga_id' => 'nullable|exists:warga,id',
        ]);

        Rt::create($request->only('rw_id', 'nomor_rt', 'ketua_rt_warga_id', 'keterangan'));
        return redirect()->route('rt.index')->with('success', 'RT berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        $rws    = Rw::select('rw_id', 'nomor_rw')->get();
        $wargas = Warga::select('id', 'nama')->get();
        return view('rt.edit', compact('rt', 'rws', 'wargas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rw_id'             => 'required|exists:rw,rw_id',
            'nomor_rt'          => 'required',
            'ketua_rt_warga_id' => 'nullable|exists:warga,id',
        ]);

        $rt->update($request->only('rw_id', 'nomor_rt', 'ketua_rt_warga_id', 'keterangan'));
        return redirect()->route('rt.index')->with('success', 'RT berhasil diubah.');
    }

    public function destroy(Rt $rt)
    {
        $rt->delete();
        return redirect()->route('rt.index')->with('success', 'RT berhasil dihapus.');
    }
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    //
}
};
