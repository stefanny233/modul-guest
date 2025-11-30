<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;

class RtSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('rt')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $rws = Rw::pluck('rw_id')->toArray();
        $wargaIds = Warga::pluck('id')->toArray();

        if (empty($rws)) {
            $this->command->info('Seeder RT dihentikan: tabel RW kosong.');
            return;
        }

        for ($i = 1; $i <= 100; $i++) {

            Rt::create([
                'rw_id' => $faker->randomElement($rws),
                'nomor_rt' => str_pad($i, 3, '0', STR_PAD_LEFT),  // RT001 – RT100
                'ketua_rt_warga_id' => !empty($wargaIds) ? $faker->randomElement($wargaIds) : null,
                'keterangan' => 'RT ' . str_pad($i, 3, '0', STR_PAD_LEFT),
            ]);
        }

        $this->command->info('Seeder RT berhasil membuat 100 data!');
    }
}
