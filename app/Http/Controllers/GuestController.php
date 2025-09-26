<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $modules = [
            ['nama' => 'Modul Perangkat Desa', 'deskripsi' => 'Berisi data perangkat desa'],
            ['nama' => 'Modul Inventaris', 'deskripsi' => 'Mencatat aset dan inventaris desa'],
            ['nama' => 'Modul Layanan', 'deskripsi' => 'Melayani kebutuhan administrasi masyarakat'],
        ];

        return view('guest.index', compact('modules'));
    }
}
