<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User Owner
        User::create([
            'name' => 'Hj. Murni',
            'email' => 'pemilik@pisangijo.test',
            'password' => 'password',
            'role' => 'owner',
        ]);

        // User Staff
        User::create([
            'name' => 'Staf Kasir',
            'email' => 'staf@pisangijo.test',
            'password' => 'password',
            'role' => 'staff',
        ]);

        // User Testing
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
