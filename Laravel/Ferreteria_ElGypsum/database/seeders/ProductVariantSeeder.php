<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::with('category')->get();
        $brands = Brand::all();

        // 🔥 REGLAS AJUSTADAS A TUS MARCAS
        $rules = [

            // ⚡ ELECTRICIDAD
            'Apagador Sencillo' => ['Eagle', 'Bticino', 'Leviton'],
            'Apagador Doble' => ['Eagle', 'Bticino', 'Leviton'],
            'Apagador Triple' => ['Eagle', 'Bticino'],
            'Tomacorriente empotrado' => ['Eagle', 'Bticino', 'Leviton'],
            'Tomacorriente Superficial' => ['Eagle'],
            'Enchufe Macho' => ['Eagle'],
            'Enchufe hembra doble' => ['Eagle'],
            'Panel Electrico 2 Espacios' => ['Eaton', 'CH'],
            'Panel Electrico 4 espacios' => ['Eaton', 'CH'],
            'Panel Electrico 8 espacios' => ['Eaton'],
            'Panel Electrico 12 espacios' => ['Eaton'],
            'Panel electrico 20 espacios' => ['Eaton'],
            'Panel Electrico 24 espacios' => ['Eaton'],

            // 🚿 BAÑO
            'Inodoro' => ['Aldosa', 'Aquaplus'],
            'Inodoro Push' => ['Aldosa'],
            'Ducha Electrica' => ['Lorenzetti', 'Generico'],
            'Ducha Cromada' => ['Griven'],
            'Llave Chorro' => ['Foset', 'Griven'],
            'Llave Campana' => ['Griven'],
            'Llave Cruzeta' => ['Griven'],
            'Llave Abasto Recta' => ['Coflex'],
            'Llave Abasto sencilla Angular' => ['Coflex'],
            'Llave Abasto Angular doble' => ['Coflex'],
            'Cinta de Teflon' => ['3M'],
            'Cepillo de Inodoro' => ['Generico'],
            'Destapador de inodoro' => ['Demonio Rojo', 'Furioso'],
            'Boya de tanques' => ['Coflex'],

            // 🔧 PLOMERIA
            'Adaptador Hembra' => ['Durman'],
            'Adaptador Macho' => ['Durman'],
            'Codo PVC Liso' => ['Durman'],
            'Codo PVC Con rosca' => ['Durman'],
            'Tee Lisa PVC' => ['Durman'],
            'Tee PVC Con rosca' => ['Durman'],
            'Union Lisa PVC' => ['Durman'],
            'Union con rosca PVC' => ['Durman'],
            'Tapon macho' => ['Durman'],
            'Tapon hembra liso' => ['Durman'],
            'Tapon hembra con rosca' => ['Durman'],
            'Yee Sanitaria' => ['Durman'],
            'Tee sanitaria' => ['Durman'],
            'Reductor PVC' => ['Durman'],
            'Pega PVC 1/8' => ['Durman', 'Griven'],

            // 🔐 SEGURIDAD
            'Candado' => ['Hermex', 'Yale', 'Lion'],
            'Candado Antisisalla' => ['Hermex'],
            'Candado Acorazado' => ['Hermex'],
            'Candado Para intemperie' => ['Hermex'],
            'Candado para moto' => ['Hermex'],
            'Cerradura de pelota' => ['Geo', 'Phillips'],
            'Cerradura Izquiera de parche' => ['Hermex'],
            'Cerradura Derecha doble accion' => ['Hermex'],
            'Cerradura Izquierda doble accion' => ['Hermex'],
            'Cerradura para porton izquierda' => ['Hermex'],
            'Cerradura para porton derecha' => ['Hermex'],
            'Chaleco reflectante' => ['3M', 'Toolcraft'],
            'Casco de seguridad' => ['3M'],
            'Guantes de Lona' => ['Truper'],
            'Guantes Antiderrapante' => ['Truper'],

            // 🛠️ HERRAMIENTAS
            'Taladro' => ['Bosch', 'Dewalt', 'Truper', 'Total'],
            'Pulidora' => ['Bosch', 'Dewalt', 'Truper', 'Total'],
            'Sierra' => ['Truper', 'Total'],
            'Cinta Metrica' => ['Truper', 'Stanley', 'Total'],
            'Caja de herramientas' => ['Truper', 'Total'],
            'Disco de corte de metal' => ['Truper', 'Total'],
            'Disco de Desbaste' => ['Truper'],
            'Broca para Madera' => ['Bosch', 'Truper'],
        ];

        foreach ($products as $product) {

          $productName = trim(strtolower($product->name));

          if (str_contains($productName, 'pvc')) {
    $allowedBrands = $brands->whereIn('name', ['Durman']);
}

            if (isset($rules[$productName])) {
                $allowedBrands = $brands->whereIn('name', $rules[$productName]);
            } else {

                // 🔄 FALLBACK INTELIGENTE
                switch ($product->category->name) {

                    case 'Electricidad':
                        $allowedBrands = $brands->whereIn('name', ['Eagle', 'Bticino', 'Leviton']);
                        break;

                    case 'Herramientas':
                        $allowedBrands = $brands->whereIn('name', ['Truper', 'Total']);
                        break;

                    case 'Plomeria':
                        $allowedBrands = $brands->whereIn('name', ['Durman']);
                        break;

                    case 'Seguridad':
                        $allowedBrands = $brands->whereIn('name', ['Hermex', 'Yale']);
                        break;

                    case 'Baño':
                        $allowedBrands = $brands->whereIn('name', ['Coflex', 'Griven', 'Foset']);
                        break;

                    default:
                        $allowedBrands = $brands;
                        break;
                }
            }

            if ($allowedBrands->count() == 0) continue;

            $selectedBrands = $allowedBrands->random(min(2, $allowedBrands->count()));

            foreach ($selectedBrands as $brand) {

                ProductVariant::firstOrCreate(
                    [
                        'product_id' => $product->id,
                        'brand_id'   => $brand->id,
                    ],
                    [
                        'price' => rand(80, 2500),
                        'stock' => rand(5, 50),
                    ]
                );
            }
        }
    }
}
