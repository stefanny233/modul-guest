<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LembagaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembaga = LembagaDesa::orderBy('created_at', 'desc')->get();
        return view('lembaga.index', compact('lembaga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lembaga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required',
        ]);

        LembagaDesa::create($request->all());

        return redirect()->route('lembaga.index')
            ->with('success', 'Data lembaga berhasil ditambahkan');
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
        $lembaga = LembagaDesa::findOrFail($id);
        return view('lembaga.edit', compact('lembaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lembaga = LembagaDesa::findOrFail($id);

        $lembaga->update($request->all());

        return redirect()->route('lembaga.index')
            ->with('success', 'Data lembaga berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lembaga = LembagaDesa::findOrFail($id);
        $lembaga->delete();

        return redirect()->route('lembaga.index')
            ->with('success', 'Data lembaga berhasil dihapus');
    }
}
