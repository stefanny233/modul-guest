<?php
namespace Database\Seeders;

use App\Models\LembagaDesa;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LembagaDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $daftarLembaga = [
            'Karang Taruna',
            'PKK Desa',
            'Badan Permusyawaratan Desa (BPD)',
            'LPM Desa',
            'Posyandu',
            'RT/RW',
            'BUMDes',
        ];

        for ($i = 1; $i <= 100; $i++) {
            LembagaDesa::create([
                'nama_lembaga' => $faker->randomElement($daftarLembaga),
                'deskripsi'    => $faker->sentence(10),
                'kontak'       => $faker->phoneNumber(),
                'logo'         => null, // biarkan null, aman
            ]);
        }
    }
}
