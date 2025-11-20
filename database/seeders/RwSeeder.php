<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Rw;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rw::truncate();

        Rw::create(['nomor_rw' => '001', 'keterangan' => 'RW 001']);
        Rw::create(['nomor_rw' => '002', 'keterangan' => 'RW 002']);
    }
}
