<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categorias')->insert([
            [
                'categoria' => 'Hogar',
                'descripcion' => 'Productos destinados al hogar'
            ],
            [
                'categoria' => 'Gaming',
                'descripcion' => 'Productos destinados para el gaming'
            ],
            [
                'categoria' => 'Oficina',
                'descripcion' => 'Productos de oficina'
            ],
            [
                'categoria' => 'Exterior',
                'descripcion' => 'Productos para usar en el exterior'
            ]
        ]);
    }
}
