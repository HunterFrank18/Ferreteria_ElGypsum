<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $productsByCategory = [
        //              ELectricidad
                'Electricidad' => [
            ['name' => 'Apagador Sencillo', 'description' => 'Ideal para casa', 'image' => 'apagador_sencillo.jpg'],
            ['name' => 'Apagador Doble', 'description' => 'Ideal para casa', 'image' => 'apagador_doble.jpg'],
            ['name' => 'Apagador Doble', 'description' => 'Ideal para casa', 'image' => 'apagador_doble.jpg'],
            ['name' => 'Apagador Triple', 'description' => 'Ideal para casa', 'image' => 'apagador_triple.jpg'],
            ['name' => 'Apagador Tortuga', 'description' => 'Ideal para casa', 'image' => 'apagador_doble.jpg'],
            ['name' => 'Cepo Plato', 'description' => 'Ideal para casa', 'image' => 'cepo_plato_eagle.jpg'],
            ['name' => 'Cepo', 'description' => 'Ideal para casa', 'image' => 'cepo.jpg'],
            ['name' => 'Cepo Hule', 'description' => 'Ideal para casa', 'image' => 'cepo_hule.jpg'],
            ['name' => 'Caja 4x4', 'description' => 'Ideal para conexiones electricas', 'image' => 'caja_4x4.jpg'],
            ['name' => 'Caja 2x4', 'description' => 'Ideal para conexiones electricas', 'image' => 'caja_2x4emt.jpg'],
            ['name' => 'Panel Electrico 2 Espacios', 'description' => 'Ideal para conexiones electricas', 'image' => 'CENTRO-DE-CARGA-2-ESPACIOS-CH.jpg'],
            ['name' => 'Panel Electrico 4 espacios', 'description' => 'Ideal para conexiones electricas', 'image' => 'CENTRO-DE-CARGA-4-ESPACIOS-CH-1-300x300.jpg'],
            ['name' => 'Panel Electrico 8 espacios', 'description' => 'Ideal para conexiones electricas', 'image' => 'CENTRO-DE-CARGA-12-ESPACIOS-CH.jpg'],
            ['name' => 'Panel Electrico 12 espacios', 'description' => 'Ideal para conexiones electricas', 'image' => 'CENTRO-DE-CARGA-12-ESPACIOS-CH.jpg'],
            ['name' => 'Panel electrico 20 espacios', 'description' => 'Ideal para conexiones electricas', 'image' => 'CENTRO-DE-CARGA-20-ESPACIOS-CH.jpg'],
            ['name' => 'Panel Electrico 24 espacios', 'description' => 'Ideal para conexiones electricas', 'image' => 'CENTRO-DE-CARGA-24-ESPACIOS-CH.jpg'],
            ['name' => 'Enchufe Macho', 'description' => 'Ideal para conexiones sencillos', 'image' => 'enchufe_tres_patas.jpg'],
            ['name' => 'Enchufe hembra doble', 'description' => 'Ideal para conexiones dobles', 'image' => 'enchufe_hembra.jpg'],
            ['name' => 'Enchufe hembra polarizado', 'description' => 'Ideal para conexiones electricas', 'image' => 'enchufe_hembra_trifasico.jpg'],
            ['name' => 'Enchufe macho doble', 'description' => 'Ideal para conexiones dobles', 'image' => 'enchufe_dos_patas.jpg'],
            ['name' => 'Tapa Ciega 2x4', 'description' => 'Ideal para casa', 'image' => 'tapa_ciega2x4.jpg'],
            ['name' => 'Tapa Ciega 4x4', 'description' => 'Ideal para casa', 'image' => 'tapa_ciega4x4.jpg'],
            ['name' => 'Tapa Plastica', 'description' => 'Ideal para casa', 'image' => 'tapa_plastica.jpg'],
            ['name' => 'Tapa de tomacorriente', 'description' => 'Ideal para conexiones electricas', 'image' => 'tapa_eagle.jpg'],
            ['name' => 'Tapa protectora', 'description' => 'Ideal para conexiones electricas', 'image' => 'tapa_paratoma.jpg'],
            ['name' => 'Tapa protectora doble', 'description' => 'Ideal para conexiones', 'image' => 'tapa_toma_doble.jpg'],
            ['name' => 'Apagador Palanca', 'description' => 'Ideal para conexiones electricas', 'image' => 'toma_de_palanca.jpg'],
            ['name' => 'Tomacorriente Superficial', 'description' => 'Ideal para conexiones electricas', 'image' => 'toma_superficial.jpg'],
            ['name' => 'Tomacorriente empotrado', 'description' => 'Ideal para conexiones electricas', 'image' => 'tomacorriente_eagle.jpg'],
                ],

            //           Baño
                  'Baño' => [
            ['name' => 'Asiento alargado','description'=>'Para tu baño','image'=>'asiento_alargado.jpg'],
            ['name' => 'Asiento Redondo', 'description' => 'Para tu baño', 'image' => 'asiento_normal.jpg'],
            ['name' => 'Barra de seguridad', 'description' => 'Para tu baño', 'image' => 'barra_seguridad.jpg'],
            ['name' => 'Boya de tanques', 'description' => 'Para tu baño', 'image' => 'BOYA-TANGUE-DE-AGUA-300x300.jpg'],
            ['name' => 'Brazo para ducha', 'description' => 'Para tu baño', 'image' => 'BRAZO-PARA-DUCHA-LORENZETTY-300x300.jpg'],
            ['name' => 'Cepillo de Inodoro', 'description' => 'Para tu baño', 'image' => 'cepillo_inodoro.jpg'],
            ['name' => 'Cinta de Teflon', 'description' => 'Para tu baño', 'image' => 'CINTA-TEFLON-300x300.jpg'],
            ['name' => 'Coladera de Metal', 'description' => 'Para tu baño', 'image' => 'coladera_metal.jpg'],
            ['name' => 'Coladera Desague', 'description' => 'Para tu baño', 'image' => 'COLADERA-DE-DESAGUE-3-FOSET-300x300.jpg'],
            ['name' => 'Destapador de inodoro', 'description' => 'Para tu baño', 'image' => 'destapador_inodoro.jpg'],
            ['name' => 'Ducha Cromada', 'description' => 'Para tu baño', 'image' => 'ducha_cromada.jpg'],
            ['name' => 'Ducha Electrica', 'description' => 'Para tu baño', 'image' => 'ducha_electrica.jpg'],
            ['name' => 'Ducha Con Brazo', 'description' => 'Para tu baño', 'image' => 'DUCHA-METALICA-CON-BRAZO-GRIVEN-300x300.jpg'],
            ['name' => 'Empaque Cera', 'description' => 'Para tu baño', 'image' => 'EMPAQUE-CERA-GRIVEN-300x300.jpg'],
            ['name' => 'Espuma expansiva', 'description' => 'Para tu baño', 'image' => 'ESPUMA-DE-POLYURETANO-EXPANSIVA-LANCO-300x300.jpg'],
            ['name' => 'Flange de Inodoro', 'description' => 'Para tu baño', 'image' => 'FLANGE-INODORO-COFLEX-300x300.jpg'],
            ['name' => 'Inodoro', 'description' => 'Para tu baño', 'image' => 'Inodoro_Aldosa.jpg'],
            ['name' => 'Inodoro Push', 'description' => 'Para tu baño', 'image' => 'Inodoro_Push.jpg'],
            ['name' => 'Kit de Tornillos', 'description' => 'Para tu baño', 'image' => 'JUEGO-TORNILLOS-PARA-INODORO-GRIVEN-300x300.jpg'],
            ['name' => 'Kit Cato', 'description' => 'Para tu baño', 'image' => 'KIT_CATO.jpg'],
            ['name' => 'Kit de inodoro', 'description' => 'Para tu baño', 'image' => 'kit_inodoro.jpg'],
            ['name' => 'Kit de inodoro Push', 'description' => 'Para tu baño', 'image' => 'KIT-INODORO de push.jpg'],
            ['name' => 'Lavamano', 'description' => 'Para tu baño', 'image' => 'LAVAMANO'],
            ['name' => 'Llave pase emt', 'description' => 'Para tu baño', 'image' => 'llave_pase_emt'],
            ['name' => 'LLave Abasto Angular doble', 'description' => 'Para tu baño', 'image' => 'LLAVE-ABASTO-ANGULAR-DOBLE-PANTRY-BRASSCRAFT-300x300.jpg'],
            ['name' => 'Llave Abasto sencilla Angular', 'description' => 'Para tu baño', 'image' => 'LLAVE-ABASTO-ANGULAR-LAVAMANO-BRASSCRAFT-300x300.jpg'],
            ['name' => 'Llave Abasto Recta', 'description' => 'Para tu baño', 'image' => 'LLAVE-ABASTO-RECTA-INODORO-BRASSCRAFT.jpg'],
            ['name' => 'Llave Chorro', 'description' => 'Para tu baño', 'image' => 'LLAVE-CHORRO-BRONCE-120G-FOSET-1-300x300.jpg'],
            ['name' => 'Llave Campana', 'description' => 'Para tu baño', 'image' => 'LLAVE-PARA-DUCHA-CAMPANA-GRVEN-300x300.jpg'],
            ['name' => 'Llave Cruzeta', 	'description'	=>	'Se usa para duchas','image'=>'LLAVE-PARA-DUCHA-CRUZETA-GRIVEN-300x300.jpg'],
            ['name'	=>	'Llave Abasto Recta','description'=>'Para tu baño','image'=>'LLAVE-ABASTO-RECTA-INODORO-BRASSCRAFT.jpg'],
            ['name'=>'Pega PVC 1/8','description'=>'Para tu baño','image'=>'PEGAMENTO-PVC-DURMAN_1octavo.jpg'],
                  ],

            //          Plomeria
                    'Plomeria' => [
            ['name' => 'Adaptador Hembra', 'description' => 'Para tu tuberia', 'image' => 'ADAPTADOR-HEMBRA-PVC-300x300.jpg'],
            ['name' => 'Adaptador Macho', 'description' => 'Para tu tuberia', 'image' => 'ADAPTADOR-MACHO-PVC-300x300.jpg'],
            ['name' => 'Codo PVC Liso', 'description' => 'Para tu baño', 'image' => 'CODO-PVC-AGUA-POTABLE-1-300x300.jpg'],
            ['name' => 'Codo PVC Con rosca', 'description' => 'Para tu baño', 'image' => 'CODO-PVC-AGUA-POTABLE-1-300x300.jpg'],
            ['name' => 'Tee Lisa PVC', 'description' => 'Para tu baño', 'image' => 'TEE-PVC-POTABLE-300x300.jpg'],
            ['name' => 'Tee PVC Con rosca', 'description' => 'Para tu baño', 'image' => 'TEE-PVC-POTABLE-300x300.jpg'],
            ['name' => 'Tapon macho', 'description' => 'Para tu baño', 'image' => 'TAPON-MACHO-PVC-300x300.jpg'],
            ['name' => 'Union Lisa PVC', 'description' => 'Para tu baño', 'image' => 'UNION-LISA-PVC-300x300.jpg'],
            ['name' => 'Union con rosca PVC', 'description' => 'Para tu baño', 'image' => 'UNION-LISA-PVC-300x300.jpg'],
            ['name' => 'Tapon hembra liso', 'description' => 'Para tu baño', 'image' => 'TAPON-HEMBRA-LISO-PVC-300x300.jpg'],
            ['name' => 'Tapon hembra con rosca', 'description' => 'Para tu baño', 'image' => 'TAPON-HEMBRA-CON-ROSCA-PVC-300x300.jpg'],
            ['name' => 'Tee sanitaria', 'description' => 'Para tu baño', 'image' => 'TEE-PVC-SANITARIA-300x300.jpg'],
            ['name' => 'Yee Sanitaria', 'description' => 'Para tu baño', 'image' => 'YEE-PVC-300x300.jpg'],
            ['name' => 'Reductor PVC', 	'description'=>'Para tu baño','image'=>'REDUCTOR-PVC-300x300.jpg'],
            ['name'=>'Terminal de Manguera Metal','description'=>'Para tu baño','image'=>'CONECTORES-PARA-MANGUERA-GRIVEN-300x300.jpg'],
            ['name'=>'Terminal de Manguera Plastico','description'=>'Para tu baño','image'=>'Terminal.jfif'],
            ['name' => 'Yee de Lavadora', 'description' => 'Para tu baño', 'image' => 'TAPON-MACHO-PVC-300x300.jpg'],
            ['name' => 'Llave Para Ducha', 'description' => 'Para tu baño', 'image' => 'llave_ducha.jpg'],
                    ],
            //          Seguridad
                    'Seguridad' => [
            ['name' => 'Candado', 'description' => 'Para tu seguridad', 'image' => 'candado_lion.jpg'],
            ['name' => 'Bisagra de Mueble', 'description' => 'Para tu seguridad', 'image' => 'BISAGRA_MUEBLE.jpg'],
            ['name' => 'Bisagra Cuadrada', 'description' => 'Para tu puerta', 'image' => 'BISAGRA-CUADRADA-ACERO-INOX-3-HERMEX-300x300.jpg'],
            ['name' => 'Candado Antisisalla', 'description' => 'Protege tu casa', 'image' => 'candado_antisisalla.jpg'],
            ['name' => 'Candado Acorazado', 'description' => 'Protege tu casa', 'image' => 'candado_acorazado.jpg'],
            ['name' => 'Candado Para intemperie', 'description' => 'Para tu seguridad', 'image' => 'candado_intemperie.jpg'],
            ['name' => 'Candado para moto', 'description' => 'Para tu moto', 'image' => 'CANDADO-PARA-MOTO-USO-RUDO-HERMEX-300x300.jpg'],
            ['name' => 'Mascara para soldar', 'description' => 'Para tu seguridad', 'image' => 'CARETA-DE-SOLDADOR-300x300.jpg'],
            ['name' => 'Casco de seguridad', 'description' => 'Para tu seguridad', 'image' => 'CASCO-DE-SEGURIDAD-BLANCO-PROFER-300x300.jpg'],
            ['name' => 'Cerradura Izquiera de parche', 'description' => 'Para tu seguridad', 'image' => 'cerradura_izq.jpg'],
            ['name' => 'Cerradura Derecha doble accion', 'description' => 'Para tu seguridad', 'image' => 'CERRADURA-DOBLE-ACCION-DERECHA-HERMEX-300x300r.jpg'],
            ['name' => 'Cerradura Izquierda doble accion', 'description' => 'Para tu seguridad', 'image' => 'CERRADURA-DOBLE-ACCION-IZQUIERDA-HERMEX-300x300.jpg'],
            ['name' => 'Chaleco reflectante', 'description' => 'Para tu seguridad', 'image' => 'CHALECO-REFLECTIVO-NARANJA-PRETUL-1-300x300.jpg'],
            ['name' => 'Cerradura para porton izquierda', 'description' => 'Para tu seguridad', 'image' => 'CERRADURA-PARA-PORTON-IZQUIERDA-HERMEX-300x300.jpg'],
            ['name' => 'Cerradura para porton derecha', 'description' => 'Para tu seguridad', 'image' => 'CERRADURA-PARA-PORTON-DERECHA-HERMEX-300x300.jpg'],
            ['name' => 'Cerradura de pelota', 'description' => 'Para tu seguridad', 'image' => 'CERRADURA-DE-PELOTA-INOXIDABLE-GEO-300x300.jpg'],
            ['name' => 'Cinta de precaucion', 'description' => 'Para tu seguridad', 'image' => 'CINTA-PRECAUCION-300x300.jpg'],
            ['name' => 'Cono', 'description' => 'Para tu seguridad', 'image' => 'CONO20-300x300.jpg'],
            ['name' => 'Pata para puerta', 'description' => 'Para tu seguridad', 'image' => 'FIJA-PUERTA-BRONCE-SECURITY-300x300.jpg'],
            ['name' => 'Guantes de Lona', 'description' => 'Para tu seguridad', 'image' => 'GUANTES-CUERO-LONETA-TRUPER-300x300.jpg'],
            ['name' => 'Guantes Antiderrapante', 'description' => 'Para tu seguridad', 'image' => 'GUANTES-ANTIDERRAPANTES-VERDES-TRUPER-300x300.jpg'],
                    ],
            //          Herramientas
                    'Herramientas' => [
            ['name' => 'Cabezabus', 'description' => 'Para tus proyectos', 'image' => 'cabezabus.jpg'],
            ['name' => 'Caja de herramientas', 'description' => 'Para tus proyectos', 'image' => 'caja_herramientas.jpg'],
            ['name' => 'Cinta Metrica', 'description' => 'Para tus proyectos', 'image' => 'cinta_truper.jpg'],
            ['name' => 'Conector para varilla polo', 'description' => 'Para tus proyectos', 'image' => 'conector.jpg'],
            ['name' => 'Disco de Desbaste', 'description' => 'Para tus proyectos', 'image' => 'disco_desbaste.jpg'],
            ['name' => 'Disco de corte de metal', 'description' => 'Para tus proyectos', 'image' => 'disco-para-corte-de-metal truper.jpg'],
            ['name' => 'Eslabon', 'description' => 'Para tus proyectos', 'image' => 'eslabon.jpg'],
            ['name' => 'Espiche para gypsum', 'description' => 'Para tus proyectos', 'image' => 'ESPICHE-PARA-GYPSUM-300x300.jpg'],
            ['name' => 'Fumigadora', 'description' => 'Para tus proyectos', 'image' => 'fumigadora.jpg'],
            ['name' => 'Fumigadora de mochila', 'description' => 'Para tus proyectos', 'image' => 'fumigadora_total.jpg'],
            ['name' => 'Jaladera de puerta', 'description' => 'Para tus proyectos', 'image' => 'jaladera_puerta.jpg'],
            ['name' => 'Broca para Madera', 'description' => 'Para tus proyectos', 'image' => 'KIT-3-300x300.jpg'],
            ['name' => 'Paint Zoom', 'description' => 'Para tus proyectos', 'image' => 'paint_zoom.jpg'],
            ['name' => 'Pulidora', 'description' => 'Para tus proyectos', 'image' => 'pulidora_truper.jpg'],
            ['name' => 'Sierra', 'description' => 'Para tus proyectos', 'image' => 'sierra.jpg'],
            ['name' => 'Taladro', 'description' => 'Para tus proyectos', 'image' => 'taladro.jpg'],
                    ]

        ];

            $categories = Category::pluck('id', 'name');
        foreach($productsByCategory as $categoryName => $products){
            foreach($products as $product){
                Product::create([
                    'category_id' => $categories[$categoryName],
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'image' => $product['image'],
                ]);
            }
        }
    }
}
