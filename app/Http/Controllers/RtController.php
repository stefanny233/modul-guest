<?php
namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q       = $request->input('q');
        $rwId    = $request->input('rw_id');
        $perPage = (int) $request->input('per_page', 15);
        $allowed = [6, 9, 12, 15, 24];
        if (! in_array($perPage, $allowed)) {
            $perPage = 15;
        }


        $query = Rt::with(['rw', 'ketua']);

        if ($q) {
            $query->where(function ($qb) use ($q) {
                $qb->where('nomor_rt', 'like', "%{$q}%")
                    ->orWhere('keterangan', 'like', "%{$q}%")
                    ->orWhereHas('ketua', function ($q2) use ($q) {
                        $q2->where('nama', 'like', "%{$q}%");
                    });
            });
        }

        if ($rwId) {
            $query->where('rw_id', $rwId);
        }

        $rts = $query->orderBy('rt_id', 'asc')->paginate($perPage)->withQueryString();

        $rws = \App\Models\Rw::select('rw_id', 'nomor_rw', 'keterangan')->orderBy('rw_id')->get();

        $warga = \App\Models\Warga::select('id', 'nama')->orderBy('nama')->get();

        return view('pages.Rt.index', compact('rts', 'rws', 'warga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rws    = Rw::select('rw_id', 'nomor_rw')->get();
        $wargas = \App\Models\Warga::select('id', 'nama')->get();
        return view('pages.rt.create', compact('rws', 'wargas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'rw_id'             => 'nullable|exists:rw,rw_id',
            'nomor_rt'          => 'required|string|max:50',
            'ketua_rt_warga_id' => 'nullable|exists:warga,id',
            'keterangan'        => 'nullable|string',
        ]);

        Rt::create($data);
        return redirect()->route('rt.index')->with('success', 'RT berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rt $rt)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rt $rt)
    {
        $rws    = Rw::select('rw_id', 'nomor_rw')->get();
        $wargas = \App\Models\Warga::select('id', 'nama')->get();
        return view('pages.rt.edit', compact('rt', 'rws', 'wargas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rt $rt)
    {
        $data = $request->validate([
            'rw_id'             => 'nullable|exists:rw,rw_id',
            'nomor_rt'          => 'required|string|max:50',
            'ketua_rt_warga_id' => 'nullable|exists:warga,id',
            'keterangan'        => 'nullable|string',
        ]);

        $rt->update($data);
        return redirect()->route('rt.index')->with('success', 'RT berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rt $rt)
    {
        $rt->delete();
        return redirect()->route('rt.index')->with('success', 'RT berhasil dihapus.');
    }
}
