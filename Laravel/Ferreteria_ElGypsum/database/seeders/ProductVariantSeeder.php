<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $product = Product::where('name', 'Taladro')->first();

if ($product) {
       $brands = Brand::whereIn('name', ['Truper', 'Total', 'Dewalt'])->get();

    foreach ($brands as $brand) {
    ProductVariant::create([
        'product_id' => $product->id,
        'brand_id'   => $brand->id,
        'price'      => rand(1500, 2500),
        'stock'      => rand(5, 20),
        ]);
    }
}else{
    echo "Producto Taladro no encontrado\n";
}


     $product = Product::where('name', 'Tomacorriente')->first();

if ($product) {
       $brands = Brand::whereIn('name', ['Eagle', 'Bticino', 'Troen', 'Chinito'])->get();

    foreach ($brands as $brand) {
    ProductVariant::create([
        'product_id' => $product->id,
        'brand_id'   => $brand->id,
        'price'      => rand(800, 1200),
        'stock'      => rand(5, 20),
        ]);
                                }
}else{
    echo "Producto Tomacorriente no encontrado\n";
}



       $product = Product::where('name', 'Destapador de Inodoro')->first();

        if ($product) {
       $brands = Brand::whereIn('name', ['Demonio Rojo', 'Furioso', 'El Dragon'])->get();

    foreach ($brands as $brand) {
    ProductVariant::create([
        'product_id' => $product->id,
        'brand_id'   => $brand->id,
        'price'      => rand(500, 600),
        'stock'      => rand(4, 12),
        ]);
                                }
        }else{
    echo "Producto Destapador de Inodoro no encontrado\n";
}


       $product = Product::where('name', 'Cinta Metrica')->first();

if ($product) {
       $brands = Brand::whereIn('name', ['Truper', 'Dewalt', 'Total'])->get();

    foreach ($brands as $brand) {
    ProductVariant::create([
        'product_id' => $product->id,
        'brand_id'   => $brand->id,
        'price'      => rand(900, 1200),
        'stock'      => rand(40, 102),
        ]);
                                }
}else{
    echo "Producto Cinta Metrica no encontrado\n";
}


    $product = Product::where('name', 'Caja de herramientas')->first();

    if ($product) {
       $brands = Brand::whereIn('name', ['Truper', 'Stanley', 'Bosch'])->get();

    foreach ($brands as $brand) {
    ProductVariant::create([
        'product_id' => $product->id,
        'brand_id'   => $brand->id,
        'price'      => rand(800, 900),
        'stock'      => rand(40, 102),
        ]);
                                }
    }
else{
    echo "Producto Caja de herramientas no encontrado\n";




    }
}
}
