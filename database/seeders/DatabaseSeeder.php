<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user test untuk login
        User::create([
            'name' => 'Admin Smart Vision',
            'email' => 'admin@smartvision.com',
            'password' => bcrypt('password123'), // Password: password123
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('test1234'), // Password: test1234
        ]);

        // Uncomment untuk membuat 10 user dummy tambahan
        // User::factory(10)->create();
    }
}
