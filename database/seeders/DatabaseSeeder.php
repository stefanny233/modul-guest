<?php
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            CreateFirstUser::class,
            WargaSeeder::class,
            PerangkatDesaSeeder::class,
        ]);

        $this->call([
            LembagaDesaSeeder::class,
            JabatanLembagaSeeder::class,
            AnggotaLembagaSeeder::class,
        ]);

        $this->call([
            RwSeeder::class,
            RtSeeder::class,
        ]);
    }
}
