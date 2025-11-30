<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rw;
use Illuminate\Support\Facades\DB;

class RwSeeder extends Seeder
{
    public function run(): void
    {
        // Matikan FK supaya truncate aman
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('rw')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Generate 100 RW
        for ($i = 1; $i <= 100; $i++) {
            Rw::create([
                'nomor_rw'  => str_pad($i, 2, '0', STR_PAD_LEFT), // RW number
                'keterangan' => 'RW ' . str_pad($i, 2, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
