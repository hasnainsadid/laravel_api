<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'title' => 'title one',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, officia?',
            'price' => '200',
            'status' => '1',
        ]);
        DB::table('products')->insert([
            'title' => 'title two',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, officia?',
            'price' => '270',
            'status' => '1',
        ]);
        DB::table('products')->insert([
            'title' => 'title three',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, officia?',
            'price' => '300',
            'status' => '0',
        ]);
        DB::table('products')->insert([
            'title' => 'title four',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, officia?',
            'price' => '250',
            'status' => '1',
        ]);
    }
}
