<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LembagaDesa;

class LembagaDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LembagaDesa::create([
            'nama_lembaga' => 'Karang Taruna',
            'deskripsi'    => 'Organisasi kepemudaan desa',
            'kontak'       => '081234567890',
        ]);

        LembagaDesa::create([
            'nama_lembaga' => 'BUMDes',
            'deskripsi'    => 'Badan usaha milik desa',
            'kontak'       => '081298765432',
        ]);
    }
}
