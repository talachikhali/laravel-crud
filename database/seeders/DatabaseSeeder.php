<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();

        User::create([
            'name' => 'Tala Chikhali',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);
    }
}
