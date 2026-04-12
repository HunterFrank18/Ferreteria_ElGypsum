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
      $admin = User::create([
            'name' => 'Admin ElGypsum',
            'email' => 'admin@elgypsum.com',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole('admin');

        $vendedor = User::create([
            'name' => 'Vendedor',
            'email' => 'vendedor@elgypsum.com',
            'password' => Hash::make('vendedor123'),
        ]);
        $vendedor->assignRole('vendedor');

        $bodega = User::create([
            'name' => 'Bodega',
            'email' => 'bodega@elgypsum.com',
            'password' => Hash::make('bodega123'),
        ]);
        $bodega->assignRole('bodega');

        $cliente = User::create([
            'name' => 'Cliente',
            'email' => 'cliente@elgypsum.com',
            'password' => Hash::make('cliente123'),
        ]);
        $cliente->assignRole('cliente');
    }
}
