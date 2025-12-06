<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{

    public function index()
    {
        // if (! Auth::check()) {
        //     return redirect()->route('login')->withErrors('silahkan login!');
        // }

        return view('pages.guest.index');
    }

    public function create()
    {
        return view('guest.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:warga,email',
        ]);

        Warga::create($request->all());
        return redirect()->route('dashboard.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('guest.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:warga,email,' . $warga->id,
        ]);

        $warga->update($request->all());
        return redirect()->route('dashboard.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Warga::destroy($id);
        return redirect()->route('dashboard.index')->with('success', 'Data berhasil dihapus!');
    }
}
