<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PerangkatDesa;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    public function index(Request $request)
    {
        $q       = $request->input('q');
        $jabatan = $request->input('jabatan');
        $perPage = (int) $request->input('per_page', 9);

        $allowed = [6, 9, 12, 24];
        if (! in_array($perPage, $allowed)) {
            $perPage = 9;
        }

        $query = PerangkatDesa::query()->with(['warga', 'media']);

        if ($q) {
            $query->where(function ($qb) use ($q) {
                $qb->where('jabatan', 'like', "%{$q}%")
                    ->orWhere('nip', 'like', "%{$q}%")
                    ->orWhere('kontak', 'like', "%{$q}%")
                    ->orWhereHas('warga', function ($q2) use ($q) {
                        $q2->where('nama', 'like', "%{$q}%")
                            ->orWhere('no_ktp', 'like', "%{$q}%")
                            ->orWhere('email', 'like', "%{$q}%");
                    });
            });
        }

        if ($jabatan) {
            $query->where('jabatan', $jabatan);
        }

        $query->orderBy('perangkat_id', 'desc');

        $perangkat = $query->paginate($perPage)->withQueryString();

        return view('pages.perangkat_desa.index', compact('perangkat'));
    }

    public function create()
    {
        $daftarJabatan = [
            'Kepala Desa',
            'Sekretaris Desa',
            'Kaur Keuangan',
            'Kaur Umum',
            'Kasi Pemerintahan',
            'Kasi Kesejahteraan',
            'Kasi Pelayanan',
            'Kepala Dusun',
            'Staff Desa',
        ];

        $warga = Warga::all();

        return view('pages.perangkat_desa.create', compact('daftarJabatan', 'warga'));
    }

    public function show($id)
    {
        $perangkat = PerangkatDesa::with('media', 'warga')->findOrFail($id);
        return view('pages.perangkat_desa.show', compact('perangkat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan'         => 'required|string|max:100',
            'nip'             => 'nullable|string|max:50',
            'kontak'          => 'required|string|max:20',
            'periode_mulai'   => 'required|date',
            'periode_selesai' => 'nullable|date',
            'files.*'         => 'nullable|file|max:5120|mimes:jpg,jpeg,png,webp,pdf,doc,docx,xlsx',
            'warga_id'        => 'nullable|integer',
        ]);

        $data = $request->only([
            'jabatan',
            'nip',
            'kontak',
            'periode_mulai',
            'periode_selesai',
            'warga_id',
        ]);

        $data['warga_id'] = $data['warga_id'] ?? 1;

        DB::transaction(function () use ($data, $request, &$perangkat) {
            $perangkat = PerangkatDesa::create($data);

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    if (! $file->isValid()) {
                        continue;
                    }
                    $storedPath = $file->store('media/perangkat_desa', 'public');
                    Media::create([
                        'ref_table'  => 'perangkat_desa',
                        'ref_id'     => $perangkat->perangkat_id,
                        'file_name'  => $storedPath,
                        'mime_type'  => $file->getClientMimeType(),
                        'caption'    => null,
                        'sort_order' => 0,
                    ]);
                }
            }
        });

        return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $perangkat = PerangkatDesa::with('media')->findOrFail($id);
        $warga     = Warga::all();

        return view('pages.perangkat_desa.edit', compact('perangkat', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan'         => 'required|string|max:100',
            'nip'             => 'nullable|string|max:50',
            'kontak'          => 'required|string|max:20',
            'periode_mulai'   => 'required|date',
            'periode_selesai' => 'nullable|date',
            'files.*'         => 'nullable|file|max:5120|mimes:jpg,jpeg,png,webp,pdf,doc,docx,xlsx',
            'warga_id'        => 'required|integer',
            'delete_media'    => 'nullable|array',
            'delete_media.*'  => 'integer',
        ]);

        $perangkat = PerangkatDesa::findOrFail($id);

        $data = $request->only([
            'jabatan',
            'nip',
            'kontak',
            'periode_mulai',
            'periode_selesai',
            'warga_id',
        ]);

        DB::transaction(function () use ($request, $perangkat, $data) {
            $perangkat->update($data);

            $deleteIds = $request->input('delete_media', []);
            if (! empty($deleteIds)) {
                $medias = Media::whereIn('media_id', $deleteIds)
                    ->where('ref_table', 'perangkat_desa')
                    ->where('ref_id', $perangkat->perangkat_id)
                    ->get();

                foreach ($medias as $m) {
                    if ($m->file_name && Storage::disk('public')->exists($m->file_name)) {
                        Storage::disk('public')->delete($m->file_name);
                    }
                    $m->delete();
                }
            }

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    if (! $file->isValid()) {
                        continue;
                    }
                    $storedPath = $file->store('media/perangkat_desa', 'public');
                    Media::create([
                        'ref_table'  => 'perangkat_desa',
                        'ref_id'     => $perangkat->perangkat_id,
                        'file_name'  => $storedPath,
                        'mime_type'  => $file->getClientMimeType(),
                        'caption'    => null,
                        'sort_order' => 0,
                    ]);
                }
            }
        });

        return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $perangkat = PerangkatDesa::findOrFail($id);

        DB::transaction(function () use ($perangkat) {
            $medias = Media::where('ref_table', 'perangkat_desa')
                ->where('ref_id', $perangkat->perangkat_id)
                ->get();

            foreach ($medias as $m) {
                if ($m->file_name && Storage::disk('public')->exists($m->file_name)) {
                    Storage::disk('public')->delete($m->file_name);
                }
                $m->delete();
            }

            $perangkat->delete();
        });

        return redirect()->route('perangkat_desa.index')->with('success', 'Data berhasil dihapus');
    }
}
