<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rt;
use App\Models\Rw;

class RtSeeder extends Seeder
{
    public function run(): void
    {
        Rt::truncate();

        $rw1 = Rw::first();
        if ($rw1) {
            Rt::create(['rw_id' => $rw1->rw_id, 'nomor_rt' => '01', 'keterangan' => 'RT 01']);
            Rt::create(['rw_id' => $rw1->rw_id, 'nomor_rt' => '02', 'keterangan' => 'RT 02']);
        }
    }
}
