<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnggotaLembagaSeeder extends Seeder
{
    public function run(): void
    {

        $existingCount = DB::table('anggota_lembaga')->count();
        if ($existingCount >= 100) {
            $this->command->info("AnggotaLembagaSeeder: Sudah ada {$existingCount} data. Seeder di-skip.");
            return;
        }

        $lembagaIds = DB::table('lembaga_desa')->pluck('lembaga_id')->toArray();
        $jabatanIds = DB::table('jabatan_lembaga')->pluck('jabatan_id')->toArray();
        $wargaIds = DB::table('warga')->pluck('id')->toArray();

        if (empty($lembagaIds) || empty($jabatanIds) || empty($wargaIds)) {
            $this->command->error('Data referensi tidak lengkap!');
            $this->command->info('Jalankan seeder untuk:');
            $this->command->info('1. LembagaDesaSeeder');
            $this->command->info('2. JabatanLembagaSeeder');
            $this->command->info('3. WargaSeeder');
            return;
        }

        $this->command->info("Membuat data anggota lembaga...");

        $data = [];
        $target = 100 - $existingCount;

        for ($i = 1; $i <= $target; $i++) {
            $tglMulai = Carbon::now()->subMonths(rand(1, 36));

            $data[] = [
                'lembaga_id'   => $lembagaIds[array_rand($lembagaIds)],
                'warga_id'     => $wargaIds[array_rand($wargaIds)],
                'jabatan_id'   => $jabatanIds[array_rand($jabatanIds)],
                'tgl_mulai'    => $tglMulai,
                'tgl_selesai'  => (rand(1, 4) === 1) ? $tglMulai->copy()->addMonths(rand(6, 24)) : null,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];

            if (count($data) >= 50) {
                DB::table('anggota_lembaga')->insert($data);
                $data = [];
            }
        }

        if (!empty($data)) {
            DB::table('anggota_lembaga')->insert($data);
        }

        $total = DB::table('anggota_lembaga')->count();
        $aktif = DB::table('anggota_lembaga')->whereNull('tgl_selesai')->count();
        $selesai = DB::table('anggota_lembaga')->whereNotNull('tgl_selesai')->count();

        $this->command->info("AnggotaLembagaSeeder selesai!");
        $this->command->info("Total data: {$total}");
        $this->command->info("Aktif: {$aktif}");
        $this->command->info("Selesai: {$selesai}");
    }
}
