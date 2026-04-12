<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {$brands = ['Truper', 'Total', 'Dewalt', 'Brickell', 'Eagle', 'Bosch', 'Griven', 'Aquafina', 'Boxer',
                '3M', 'Coflex', 'Generico', 'Demonio Rojo', 'Furioso', 'El Dragon', 'Lanco', 'Aldosa', 'Foset'
                ,'Ecoline', 'Durman', 'Cato', 'Bticino', 'Troen', 'Chinito', 'Eaton', 'CH', 'Leviton',
                 'Aquaplus', 'Toolcraft', 'Lion', 'Hermex', 'Yale', 'Uyustool', 'Geo', 'Phillips',
                'Rabbit', 'Security', ];

        foreach($brands as $brand){
            Brand::create(['name' => $brand]);
        }
    }
 }

