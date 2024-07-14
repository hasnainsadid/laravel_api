<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'name' => 'Alauddin',
            'age' => '27',
            'email' => 'alauddin@gmail.com',
        ]);
        DB::table('students')->insert([
            'name' => 'Mamun or Rashid',
            'age' => '27',
            'email' => 'mamun@gmail.com',
        ]);
        DB::table('students')->insert([
            'name' => 'Hasnain Sadid',
            'age' => '27',
            'email' => 'sadid@gmail.com',
        ]);
    }
}
