<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\LembagaDesa;

class JabatanLembagaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $lembagaIds = LembagaDesa::pluck('lembaga_id')->toArray();

        if (empty($lembagaIds)) {
            LembagaDesa::insert([
                ['nama_lembaga' => 'Karang Taruna', 'deskripsi' => '...', 'kontak' => null],
                ['nama_lembaga' => 'PKK Desa', 'deskripsi' => '...', 'kontak' => null],
                ['nama_lembaga' => 'BUMDes', 'deskripsi' => '...', 'kontak' => null],
            ]);
            $lembagaIds = LembagaDesa::pluck('lembaga_id')->toArray();
        }

        $columns = Schema::getColumnListing('jabatan_lembaga');

        for ($i = 1; $i <= 100; $i++) {

            $namaJabatan = $faker->randomElement([
                'Ketua', 'Wakil Ketua', 'Sekretaris', 'Bendahara',
                'Anggota', 'Koordinator', 'Supervisor', 'Pembina',
                'Penasehat', 'Staf Administrasi'
            ]);

            $lembagaId = $faker->randomElement($lembagaIds);

            $row = [
                'lembaga_id'   => $lembagaId,
                'nama_jabatan' => $namaJabatan . ' ' . $i,
                'level'        => (string) $faker->numberBetween(1, 5),
                'keterangan'   => $faker->sentence(8),
            ];

            if (in_array('slug', $columns)) {
                $row['slug'] = Str::slug($namaJabatan . '-' . $lembagaId . '-' . $i);
            }

            $row = array_intersect_key($row, array_flip($columns));

            DB::table('jabatan_lembaga')->insert($row);
        }
    }
}
