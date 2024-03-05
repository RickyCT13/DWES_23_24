<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        DB::table('courses')->insert($randomRecords);
    }
}
