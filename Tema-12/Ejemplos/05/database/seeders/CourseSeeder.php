<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use Database\Factories\CourseFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Añadir varios cursos
        /*
            En este caso, 
        */
        $randomRecords = [];
        for ($i = 1; $i <= 5; $i++) {
            $randomRecords[] = [
                'name' => Str::random(20),
                'cycle' => Str::random(20). " FP"
            ];
        }
        //DB::table('courses')->insert($randomRecords);

        /*
            Adición de registros desde factory
        */
        $courses = Course::factory()->count(20)->create();
    }
}
