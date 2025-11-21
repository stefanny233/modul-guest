<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $q       = $request->input('q');
        $from    = $request->input('from');
        $to      = $request->input('to');
        $perPage = (int) $request->input('per_page', 12);

        $allowed = [6, 12, 24, 48];
        if (! in_array($perPage, $allowed)) {
            $perPage = 12;
        }

        $query = Warga::query();

        if ($q) {
            $query->where(function ($qb) use ($q) {
                $qb->where('nama', 'like', "%{$q}%")
                    ->orWhere('no_ktp', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        if ($from) {
            $query->whereDate('created_at', '>=', $from);
        }
        if ($to) {
            $query->whereDate('created_at', '<=', $to);
        }

        $query->orderBy('created_at', 'desc');

        $warga = $query->paginate($perPage)->withQueryString();

        return view('pages.warga.index', compact('warga'));
    }

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp'        => 'required|unique:warga,no_ktp,',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'agama'         => 'nullable|string',
            'pekerjaan'     => 'nullable|string',
            'telp'          => 'nullable|string|max:15',
            'email'         => 'nullable|email',
        ]);

        Warga::create($request->all());
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'no_ktp'        => 'required|unique:warga,no_ktp,' . $warga->id . ',id',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'agama'         => 'nullable|string',
            'pekerjaan'     => 'nullable|string',
            'telp'          => 'nullable|string|max:15',
            'email'         => 'nullable|email',
        ]);

        $warga->update($request->all());
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus!');
    }
}
