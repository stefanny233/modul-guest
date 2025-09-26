<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduk = [
            ['nama' => 'Budi Santoso', 'nik' => '1234567890123456', 'alamat' => 'Jl. Melati No.10'],
            ['nama' => 'Ani Lestari', 'nik' => '6543210987654321', 'alamat' => 'Jl. Mawar No.5'],
            ['nama' => 'Siti Aminah', 'nik' => '7894561230123456', 'alamat' => 'Jl. Kenanga No.7'],
        ];
        return view('penduduk.index', compact('penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
