<?php
// app/Http/Controllers/AnggotaLembagaController.php

namespace App\Http\Controllers;

use App\Models\AnggotaLembaga;
use App\Models\JabatanLembaga;
use App\Models\LembagaDesa;
use App\Models\Warga;
use Illuminate\Http\Request;

class AnggotaLembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AnggotaLembaga::with(['lembaga', 'warga', 'jabatan'])
            ->latest();

        // Search by nama warga
        if ($request->filled('q')) {
            $search = $request->q;
            $query->whereHas('warga', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        // Filter by lembaga
        if ($request->filled('lembaga_id')) {
            $query->where('lembaga_id', $request->lembaga_id);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'aktif') {
                $query->whereNull('tgl_selesai');
            } elseif ($request->status === 'selesai') {
                $query->whereNotNull('tgl_selesai');
            }
        }

        $perPage = $request->get('per_page', 9);
        $anggota = $query->paginate($perPage);

        $lembagaList = LembagaDesa::orderBy('nama_lembaga')->get();

        return view('pages.anggota-lembaga.index', compact('anggota', 'lembagaList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lembagaList = LembagaDesa::orderBy('nama_lembaga')->get();
        $wargaList   = Warga::orderBy('nama')->get();
        $jabatanList = JabatanLembaga::orderBy('nama_jabatan')->get();

        return view('pages.anggota-lembaga.create', compact('lembagaList', 'wargaList', 'jabatanList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lembaga_id'  => 'required|exists:lembaga_desa,lembaga_id',
            'warga_id'    => 'required|exists:warga,id',
            'jabatan_id'  => 'required|exists:jabatan_lembaga,jabatan_id',
            'tgl_mulai'   => 'required|date',
            'status'      => 'required|in:aktif,selesai',
            'tgl_selesai' => 'nullable|date|after:tgl_mulai',
        ]);

        // Check for duplicate active membership
        $existing = AnggotaLembaga::where('warga_id', $validated['warga_id'])
            ->where('lembaga_id', $validated['lembaga_id'])
            ->whereNull('tgl_selesai')
            ->exists();

        if ($existing) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['warga_id' => 'Warga ini sudah menjadi anggota aktif di lembaga ini.']);
        }

        $anggota             = new AnggotaLembaga();
        $anggota->lembaga_id = $validated['lembaga_id'];
        $anggota->warga_id   = $validated['warga_id'];
        $anggota->jabatan_id = $validated['jabatan_id'];
        $anggota->tgl_mulai  = $validated['tgl_mulai'];

        if ($validated['status'] === 'selesai' && $request->filled('tgl_selesai')) {
            $anggota->tgl_selesai = $request->tgl_selesai;
        }

        $anggota->save();

        return redirect()->route('anggota-lembaga.index')
            ->with('success', 'Anggota lembaga berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnggotaLembaga $anggotaLembaga)
    {
        $anggota     = $anggotaLembaga;
        $lembagaList = LembagaDesa::orderBy('nama_lembaga')->get();
        $wargaList   = Warga::orderBy('nama')->get();
        $jabatanList = JabatanLembaga::orderBy('nama_jabatan')->get();

        return view('pages.anggota-lembaga.edit', compact('anggota', 'lembagaList', 'wargaList', 'jabatanList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnggotaLembaga $anggotaLembaga)
    {
        $validated = $request->validate([
            'lembaga_id'  => 'required|exists:lembaga_desa,lembaga_id',
            'warga_id'    => 'required|exists:warga,id',
            'jabatan_id'  => 'required|exists:jabatan_lembaga,jabatan_id',
            'tgl_mulai'   => 'required|date',
            'status'      => 'required|in:aktif,selesai',
            'tgl_selesai' => 'nullable|date|after:tgl_mulai',
        ]);

        // Check for duplicate active membership (exclude current record)
        if ($validated['status'] === 'aktif') {
            $existing = AnggotaLembaga::where('warga_id', $validated['warga_id'])
                ->where('lembaga_id', $validated['lembaga_id'])
                ->where('anggota_id', '!=', $anggotaLembaga->anggota_id)
                ->whereNull('tgl_selesai')
                ->exists();

            if ($existing) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['warga_id' => 'Warga ini sudah menjadi anggota aktif di lembaga ini.']);
            }
        }

        $anggotaLembaga->lembaga_id = $validated['lembaga_id'];
        $anggotaLembaga->warga_id   = $validated['warga_id'];
        $anggotaLembaga->jabatan_id = $validated['jabatan_id'];
        $anggotaLembaga->tgl_mulai  = $validated['tgl_mulai'];

        if ($validated['status'] === 'selesai' && $request->filled('tgl_selesai')) {
            $anggotaLembaga->tgl_selesai = $request->tgl_selesai;
        } else {
            $anggotaLembaga->tgl_selesai = null;
        }

        $anggotaLembaga->save();

        return redirect()->route('anggota-lembaga.index')
            ->with('success', 'Data anggota lembaga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnggotaLembaga $anggotaLembaga)
    {
        $anggotaLembaga->delete();

        return redirect()->route('anggota-lembaga.index')
            ->with('success', 'Anggota lembaga berhasil dihapus.');
    }

    /**
     * Get anggota by lembaga (for API or dropdown)
     */
    public function getByLembaga($lembagaId)
    {
        $anggota = AnggotaLembaga::with(['warga', 'jabatan'])
            ->where('lembaga_id', $lembagaId)
            ->whereNull('tgl_selesai')
            ->get();

        return response()->json($anggota);
    }
}
