<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'full_name' => 'Francisco Quezada',
            'email' => 'fquezada@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

          User::create([
           'full_name' => 'Tony Mendez',
            'email' => 'Tmendez@gmail.com',
            'password' => Hash::make('57688045'),
        ]);

        User::factory(10)->create();
    }
}
