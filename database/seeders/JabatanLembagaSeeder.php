<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class JabatanLembagaSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'lembaga_id'   => 1,
                'nama_jabatan' => 'Ketua',
                'level'        => '1',
                'keterangan'   => 'Ketua utama lembaga',
            ],
            [
                'lembaga_id'   => 2,
                'nama_jabatan' => 'Sekretaris',
                'level'        => '2',
                'keterangan'   => 'Bagian pencatatan data lembaga',
            ],
        ];

        $columns = Schema::getColumnListing('jabatan_lembaga');

        foreach ($items as $it) {
            // hanya gunakan kolom yang ada di DB
            $row = array_intersect_key($it, array_flip($columns));

            // buat slug otomatis jika kolom slug ada
            if (in_array('slug', $columns) && ! empty($row['nama_jabatan'])) {
                $row['slug'] = Str::slug($row['nama_jabatan']);
            }

            // gunakan updateOrInsert supaya tidak duplikat
            $where = [];
            if (isset($row['nama_jabatan'])) {
                $where['nama_jabatan'] = $row['nama_jabatan'];
                if (isset($row['lembaga_id'])) {
                    $where['lembaga_id'] = $row['lembaga_id'];
                }
            }

            if (! empty($where)) {
                DB::table('jabatan_lembaga')->updateOrInsert($where, $row);
            } else {
                // fallback: insert tapi hati-hati (jarang terjadi)
                DB::table('jabatan_lembaga')->insert($row);
            }
        }
    }
}
