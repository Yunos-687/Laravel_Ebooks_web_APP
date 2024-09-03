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
        // User::factory(10)->create();

        User::factory()->create([
            'email' => 'john.doe@example.com',
            'firstname' => 'John',
            'lastname' => 'Doe',
            'age' => 30, // Example age, adjust as needed
            'address' => '123 Example St, Example City', // Example address, adjust as needed
            'password' => 'password123', // Make sure to hash passwords

        ]);
    }
}
