<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'aku@gmail.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('pani123'),
            ]
        );

        if (User::count() < 5) {
            User::factory()->count(100)->create();
        }
    }
}
