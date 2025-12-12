<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanLembagaSeeder extends Seeder
{
    public function run(): void
    {
        // Jika sudah ada data, jangan insert lagi
        if (DB::table('jabatan_lembaga')->exists()) {
            return;
        }

        $faker = \Faker\Factory::create('id_ID');

        $lembagaIds = DB::table('lembaga_desa')->pluck('lembaga_id')->toArray();

        foreach (range(1, 100) as $i) {
            DB::table('jabatan_lembaga')->insert([
                'lembaga_id'   => $faker->randomElement($lembagaIds),
                'nama_jabatan' => 'Jabatan ' . $i,
                'level'        => $faker->numberBetween(1, 5),
                'keterangan'   => $faker->randomElement([
                    'Mengelola kegiatan lembaga desa.',
                    'Membantu pelaksanaan program rutin.',
                    'Mengatur administrasi internal lembaga.',
                ]),
                'slug'         => 'jabatan-' . $i,
            ]);
        }
    }
}
