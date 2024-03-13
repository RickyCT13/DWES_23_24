<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            //
            'descripcion' => fake()->words(3, true),
            'categoria_id' => fake()->numberBetween(1, 24),
            'stock' => fake()->numberBetween(0, 1000),
            'precio_coste' => fake()->randomFloat(2, 0, 10000),
            'precio_venta' => fake()->randomFloat(2, 0, 10000),
            'imagen' => null
        ];
    }
}
