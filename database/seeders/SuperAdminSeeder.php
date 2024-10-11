<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'admin@example.com',
            'password' => '12345678',
            'email_verified_at' => now(),
            'status' => '1',
        ]);
    }
}
