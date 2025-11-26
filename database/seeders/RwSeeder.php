<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Rw;
use Illuminate\Support\Facades\DB;

class RwSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('rw')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 10; $i++) {
            Rw::create([
                'keterangan' => 'RW ' . str_pad($i,2,'0',STR_PAD_LEFT),
            ]);
        }
    }
}
