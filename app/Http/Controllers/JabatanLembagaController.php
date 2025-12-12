<?php
namespace App\Http\Controllers;

use App\Models\JabatanLembaga;
use App\Models\LembagaDesa;
use Illuminate\Http\Request;

class JabatanLembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q         = $request->input('q');
        $lembagaId = $request->input('lembaga_id');
        $perPage   = (int) $request->input('per_page', 12);

        $allowed = [6, 12, 24, 48]; 
        if (! in_array($perPage, $allowed)) {
            $perPage = 12;
        }

        $lembagaList = LembagaDesa::orderBy('nama_lembaga')->get();

        $query = JabatanLembaga::with('lembaga');

        if ($q) {
            $query->where(function ($qb) use ($q) {
                $qb->where('nama_jabatan', 'like', "%{$q}%")
                    ->orWhere('level', 'like', "%{$q}%")
                    ->orWhere('keterangan', 'like', "%{$q}%")
                    ->orWhereHas('lembaga', function ($q2) use ($q) {
                        $q2->where('nama_lembaga', 'like', "%{$q}%");
                    });
            });
        }

        if ($lembagaId) {
            $query->where('lembaga_id', $lembagaId);
        }

        try {
            $attrs = JabatanLembaga::firstOrNew()->getAttributes();
            if (array_key_exists('created_at', $attrs)) {
                $query->orderBy('created_at', 'desc');
            } else {
                $query->orderBy('jabatan_id', 'desc');
            }
        } catch (\Throwable $e) {

            $query->orderBy('jabatan_id', 'desc');
        }

        $jabatan = $query->paginate($perPage)->withQueryString();

        return view('pages.jabatan.index', compact('jabatan', 'lembagaList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ambil daftar lembaga untuk dropdown (opsional)
        $lembaga = LembagaDesa::orderBy('nama_lembaga')->get();

        // tidak usah bikin daftar jabatan di controller supaya simple
        return view('pages.jabatan.create', compact('lembaga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi sederhana
        $request->validate([
            // kita terima nama_jabatan langsung (paling sederhana)
            'nama_jabatan' => 'required|string|max:255',
            'lembaga_id'   => 'nullable|integer',
            'level'        => 'nullable|string|max:100',
            'keterangan'   => 'nullable|string',
        ]);

        // siapkan data sesuai $fillable di model
        $data = [
            'nama_jabatan' => $request->input('nama_jabatan'),
            'level'        => $request->input('level'),
            'keterangan'   => $request->input('keterangan'),
        ];

        if ($request->filled('lembaga_id')) {
            $data['lembaga_id'] = $request->input('lembaga_id');
        }

        JabatanLembaga::create($data);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JabatanLembaga $jabatan)
    {
        $lembaga = LembagaDesa::orderBy('nama_lembaga')->get();
        return view('pages.jabatan.edit', compact('jabatan', 'lembaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JabatanLembaga $jabatan)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'lembaga_id'   => 'nullable|integer',
            'level'        => 'nullable|string|max:100',
            'keterangan'   => 'nullable|string',
        ]);

        $data = [
            'nama_jabatan' => $request->input('nama_jabatan'),
            'level'        => $request->input('level'),
            'keterangan'   => $request->input('keterangan'),
        ];

        if ($request->has('lembaga_id')) {
            $data['lembaga_id'] = $request->input('lembaga_id');
        }

        $jabatan->update($data);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JabatanLembaga $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}
