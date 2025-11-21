<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class JabatanLembagaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Atur sesuai berapa banyak lembaga di DBmu.
        // Jika kamu punya 7 lembaga, biarkan 7. Kalau lebih, ubah angka ini.
        $maxLembagaId = 7;

        // ambil daftar kolom untuk keamanan
        $columns = Schema::getColumnListing('jabatan_lembaga');

        for ($i = 1; $i <= 100; $i++) {
            $namaJabatan = $faker->randomElement([
                'Ketua', 'Wakil Ketua', 'Sekretaris', 'Bendahara',
                'Anggota', 'Koordinator', 'Supervisor', 'Pembina',
                'Penasehat', 'Staf Administrasi'
            ]);

            $lembagaId = $faker->numberBetween(1, $maxLembagaId);

            // data mentah yang ingin disimpan
            $row = [
                'lembaga_id'   => $lembagaId,
                'nama_jabatan' => $namaJabatan,
                'level'        => (string) $faker->numberBetween(1, 5),
                'keterangan'   => $faker->sentence(8),
            ];

            // jika kolom slug ada, buat slug yang unik dengan index
            if (in_array('slug', $columns)) {
                $row['slug'] = Str::slug($namaJabatan . '-' . $lembagaId . '-' . $i);
            }

            // pastikan hanya kolom yang valid yang kita kirim ke DB
            $row = array_intersect_key($row, array_flip($columns));

            // gunakan updateOrInsert untuk mencegah duplicate key error
            // pencarian berdasarkan kombinasi unik (lembaga_id + nama_jabatan)
            $where = [];
            if (isset($row['lembaga_id'])) {
                $where['lembaga_id'] = $row['lembaga_id'];
            }
            if (isset($row['nama_jabatan'])) {
                $where['nama_jabatan'] = $row['nama_jabatan'];
            }

            if (! empty($where)) {
                DB::table('jabatan_lembaga')->updateOrInsert($where, $row);
            } else {
                DB::table('jabatan_lembaga')->insert($row);
            }
        }
    }
}
