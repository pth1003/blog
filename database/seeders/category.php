<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            'name' => 'Sport'
        ]);

        DB::table('category')->insert([
            'name' => 'Art'
        ]);

        DB::table('category')->insert([
            'name' => 'Heath'
        ]);

        DB::table('category')->insert([
            'name' => 'Entertainment'
        ]);

        DB::table('category')->insert([
            'name' => 'science'
        ]);
    }
}
