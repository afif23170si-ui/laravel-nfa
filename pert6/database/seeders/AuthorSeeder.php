<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            ['name' => 'J.K. Rowling'],
            ['name' => 'Tere Liye'],
            ['name' => 'George R.R. Martin'],
            ['name' => 'Andrea Hirata'],
            ['name' => 'Pramoedya Ananta Toer'],
        ]);
    }
}