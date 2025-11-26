<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;

class RtSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan foreign key tidak menghalangi truncate
        Schema::disableForeignKeyConstraints();
        Rt::truncate();
        Schema::enableForeignKeyConstraints();

        $rws = Rw::all();
        $wargas = Warga::pluck('id')->toArray();

        if ($rws->isEmpty()) {
            // Jika tidak ada data RW, tidak bisa seed RT
            echo "Seeder RT dilewati: tidak ada data RW.\n";
            return;
        }

        for ($i = 1; $i <= 100; $i++) {

            $rw = $rws->random(); // pilih RW acak
            $ketua = !empty($wargas) ? fake()->randomElement($wargas) : null;

            Rt::create([
                'rw_id'             => $rw->rw_id,
                'nomor_rt'          => str_pad(($i % 20) + 1, 2, '0', STR_PAD_LEFT),
                'ketua_rt_warga_id' => $ketua,
                'keterangan'        => "RT nomor " . str_pad(($i % 20) + 1, 2, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
