<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerangkatDesa;
use App\Models\Warga;
use Faker\Factory as Faker;

class PerangkatDesaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // pastikan ada warga
        if (Warga::count() == 0) {
            for ($i = 1; $i <= 100; $i++) {
                Warga::create([
                    'no_ktp' => $faker->unique()->numerify('################'),
                    'nama' => $faker->name(),
                    'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                    'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                    'pekerjaan' => $faker->jobTitle(),
                    'telp' => $faker->phoneNumber(),
                    'email' => $faker->unique()->safeEmail(),
                ]);
            }
        }

        $wargaIds = Warga::pluck('id')->toArray();

        for ($i = 1; $i <= 100; $i++) {
            PerangkatDesa::create([
                'warga_id'        => $faker->randomElement($wargaIds),
                'jabatan'         => $faker->randomElement([
                    'Kepala Desa', 'Sekretaris Desa', 'Kaur Keuangan', 'Kaur Umum',
                    'Kasi Pemerintahan', 'Kasi Kesejahteraan', 'Kasi Pelayanan',
                    'Kepala Dusun', 'Staff Desa'
                ]),
                'nip'             => $faker->numerify('1990########'),
                'kontak'          => $faker->phoneNumber(),
                'periode_mulai'   => $faker->date(),
                'periode_selesai' => $faker->optional()->date(),
                'foto'            => null,
            ]);
        }
    }
}
