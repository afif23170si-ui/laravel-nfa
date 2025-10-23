<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        Genre::insert([
            ['name' => 'Fantasy', 'description' => 'Fictional imaginative worlds'],
            ['name' => 'Adventure', 'description' => 'Exciting and risky experiences'],
            ['name' => 'Drama', 'description' => 'Stories with emotional themes'],
            ['name' => 'Historical', 'description' => 'Based on past events'],
        ]);
    }
}
