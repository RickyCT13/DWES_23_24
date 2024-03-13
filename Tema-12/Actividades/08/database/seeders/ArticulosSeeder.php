<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('articulos')->insert([
            [
                'descripcion' => 'Nevera 1',
                'categoria_id' => 1,
                'stock' => 50,
                'precio_coste' => 352.25,
                'precio_venta' => 375.00
            ],
            [
                'descripcion' => 'Mesa de comedor 1',
                'categoria_id' => 1,
                'stock' => 75,
                'precio_coste' => 50.00,
                'precio_venta' => 68.99
            ],
            [
                'descripcion' => 'Portátil 1',
                'categoria_id' => 2,
                'stock' => 74,
                'precio_coste' => 525.00,
                'precio_venta' => 600.00
            ],
            [
                'descripcion' => 'USB hub',
                'categoria_id' => 2,
                'stock' => 28,
                'precio_coste' => 15.00,
                'precio_venta' => 20.00
            ],
            [
                'descripcion' => 'Tóner impresora multicolor',
                'categoria_id' => 3,
                'stock' => 158,
                'precio_coste' => 20.00,
                'precio_venta' => 45.00
            ],
            [
                'descripcion' => 'Caja 1000 folios para imprimir',
                'categoria_id' => 3,
                'stock' => 84,
                'precio_coste' => 5.00,
                'precio_venta' => 15.00
            ],
            [
                'descripcion' => 'Césped artificial 50m',
                'categoria_id' => 4,
                'stock' => 123,
                'precio_coste' => 50.00,
                'precio_venta' => 78.99
            ],
            [
                'descripcion' => 'Tienda de camping espaciosa',
                'categoria_id' => 4,
                'stock' => 154,
                'precio_coste' => 124.58,
                'precio_venta' => 158.85
            ]
        ]);
        $articulos = Articulo::factory()->count(40)->create();
    }
}
