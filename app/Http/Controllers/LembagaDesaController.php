<?php
namespace App\Http\Controllers;

use App\Models\LembagaDesa;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LembagaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q       = $request->input('q');
        $nama    = $request->input('nama_lembaga');
        $perPage = (int) $request->input('per_page', 9);

        $allowed = [6, 9, 12, 24];
        if (! in_array($perPage, $allowed)) {
            $perPage = 9;
        }

        // PASTIKAN with('media') TAPI HAPUS 'warga' karena lembaga gak punya relasi ke warga
        $query = LembagaDesa::query()->with(['media', 'anggota']);

        if ($q) {
            $query->where(function ($qb) use ($q) {
                $qb->where('nama_lembaga', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%")
                    ->orWhere('kontak', 'like', "%{$q}%");
            });
        }

        if ($nama) {
            $query->where('nama_lembaga', $nama);
        }

        $query->orderBy('lembaga_id', 'desc');

        $lembaga = $query->paginate($perPage)->withQueryString();

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
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'kontak'       => 'nullable|string|max:100',
            'logo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::transaction(function () use ($request) {
            $lembaga = LembagaDesa::create([
                'nama_lembaga' => $request->nama_lembaga,
                'deskripsi'    => $request->deskripsi,
                'kontak'       => $request->kontak,
            ]);

            if ($request->hasFile('logo')) {
                $file       = $request->file('logo');
                $storedPath = $file->store('media/lembaga_desa', 'public');

                Media::create([
                    'ref_table'  => 'lembaga_desa',
                    'ref_id'     => $lembaga->lembaga_id,
                    'file_name'  => $storedPath,
                    'file_url'   => $storedPath,
                    'mime_type'  => $file->getClientMimeType(),
                    'caption'    => 'Logo ' . $lembaga->nama_lembaga,
                    'sort_order' => 1,
                ]);
            }
        });

        return redirect()->route('lembaga.index')
            ->with('success', 'Lembaga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lembaga = LembagaDesa::with(['media', 'anggota.warga', 'anggota.jabatan', 'jabatan'])
            ->findOrFail($id);
        return view('pages.lembaga.show', compact('lembaga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // PASTIKAN with('media')
        $lembaga = LembagaDesa::with('media')->findOrFail($id);
        return view('pages.lembaga.edit', compact('lembaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'kontak'       => 'nullable|string|max:100',
            'logo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'delete_logo'  => 'nullable|boolean',
        ]);

        $lembaga = LembagaDesa::findOrFail($id);

        DB::transaction(function () use ($request, $lembaga) {
            $lembaga->update([
                'nama_lembaga' => $request->nama_lembaga,
                'deskripsi'    => $request->deskripsi,
                'kontak'       => $request->kontak,
            ]);

            if ($request->has('delete_logo')) {
                $mediaLogo = $lembaga->media()->where('mime_type', 'like', 'image%')->first();
                if ($mediaLogo) {
                    if ($mediaLogo->file_name && Storage::disk('public')->exists($mediaLogo->file_name)) {
                        Storage::disk('public')->delete($mediaLogo->file_name);
                    }
                    $mediaLogo->delete();
                }
            }

            if ($request->hasFile('logo')) {
                $lembaga->media()->where('mime_type', 'like', 'image%')->delete();

                // Upload file baru
                $file       = $request->file('logo');
                $storedPath = $file->store('media/lembaga_desa', 'public');

                Media::create([
                    'ref_table'  => 'lembaga_desa',
                    'ref_id'     => $lembaga->lembaga_id,
                    'file_name'  => $storedPath,
                    'file_url'   => $storedPath,
                    'mime_type'  => $file->getClientMimeType(),
                    'caption'    => 'Logo ' . $lembaga->nama_lembaga,
                    'sort_order' => 1,
                ]);
            }
        });

        return redirect()->route('lembaga.index')
            ->with('success', 'Lembaga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lembaga = LembagaDesa::findOrFail($id);

        DB::transaction(function () use ($lembaga) {
            $medias = Media::where('ref_table', 'lembaga_desa')
                ->where('ref_id', $lembaga->lembaga_id)
                ->get();

            foreach ($medias as $media) {
                if ($media->file_name && Storage::disk('public')->exists($media->file_name)) {
                    Storage::disk('public')->delete($media->file_name);
                }
                $media->delete();
            }

            $lembaga->delete();
        });

        return redirect()->route('lembaga.index')
            ->with('success', 'Lembaga berhasil dihapus.');
    }
}
