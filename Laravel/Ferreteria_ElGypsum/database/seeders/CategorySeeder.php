<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electricidad', 'slug' => 'electricidad', 'description' => 'Productos eléctricos'],
            ['name' => 'Baño', 'slug' => 'bano', 'description' => 'Accesorios de baño'],
            ['name' => 'Plomeria', 'slug' => 'plomeria', 'description' => 'Todo para plomería'],
            ['name' => 'Seguridad', 'slug' => 'seguridad', 'description' => 'Accesorios de seguridad'],
            ['name' => 'Herramientas', 'slug' => 'herramientas', 'description' => 'Herramientas para el hogar'],

        ];

        foreach($categories as $cat) {
            Category::create($cat);
        }
    }
}
