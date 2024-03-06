<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            //
            'first_name' => fake()->firstName(),
            'last_names' => fake()->lastName(),
            'birth_date' => fake()->dateTimeThisCentury(),
            'phone_number' => fake()->unique()->numerify('6#########'),
            'city' => Str::limit(fake()->city(), 40),
            'dni' => Str::random(9),
            'email' => fake()->unique()->safeEmail(),
            'course_id' => fake()->numberBetween(1, 20)
        ];
    }
}
