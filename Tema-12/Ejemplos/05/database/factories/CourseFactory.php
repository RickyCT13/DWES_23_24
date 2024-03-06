<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory {

    /*
        Factories
        Las model factories presentan una manera fácil de poblar
        una base de datos con datos de prueba

        A diferencia de los seeders, las model factories generan los datos
        con un mayor grado de automatización
    */

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /*
        Tenemos que especificar el modelo
    */
    protected $model = Course::class;
    public function definition(): array {
        return [
            //
            'name' => fake()->randomElement(['1DAW', '2DAW', '1SMR', '2SMR', '1AD', '2AD', '1DAM', '2DAM', '1ASIR', '2ASIR']),
            'cycle' => fake()->randomElement(['Desarrollo de Aplicaciones Web', 'Asistencia a la Dirección', 'Sistemas Microinformáticos y Redes', 'Desarrollo de Aplicaciones Multipl', 'Administración de sis inf en rer'])
        ];
    }
}
