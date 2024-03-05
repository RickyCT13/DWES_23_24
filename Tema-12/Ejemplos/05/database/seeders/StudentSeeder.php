<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\DateFactory;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $randomRecords = [];
        for ($i = 1; $i <= 5; $i++) {
            $randomRecords[] = [
                'first_name' => Str::random(35),
                'last_names' => Str::random(45),
                'birth_date' => '2000/05/0'.$i,
                'phone_number' => random_int(100000000000000, 999999999999999),
                'city' => Str::random(20),
                'dni' => Str::random(9),
                'email' => Str::random(40),
                'course_id' => random_int(1, 6)
            ];
        }

        DB::table('students')->insert($randomRecords);
    }
}
