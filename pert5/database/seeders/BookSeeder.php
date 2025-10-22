<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            ['title' => 'Harry Potter and the Sorcerer\'s Stone', 'author_id' => 1],
            ['title' => 'Bumi', 'author_id' => 2],
            ['title' => 'A Game of Thrones', 'author_id' => 3],
            ['title' => 'Laskar Pelangi', 'author_id' => 4],
            ['title' => 'Bumi Manusia', 'author_id' => 5],
        ]);
    }
}