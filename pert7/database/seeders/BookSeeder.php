<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::insert([
            [
                'title' => "Harry Potter and the Sorcerer's Stone",
                'description' => 'Fantasy novel about a young wizard.',
                'price' => 150000,
                'stock' => 10,
                'cover_photo' => 'harry_potter.jpg',
                'genre_id' => 1,
                'author_id' => 1,
            ],
            [
                'title' => 'Bumi',
                'description' => 'Fantasy adventure novel by Tere Liye.',
                'price' => 120000,
                'stock' => 15,
                'cover_photo' => 'bumi.jpg',
                'genre_id' => 2,
                'author_id' => 2,
            ],
            [
                'title' => 'A Game of Thrones',
                'description' => 'First novel in A Song of Ice and Fire series.',
                'price' => 180000,
                'stock' => 8,
                'cover_photo' => 'got.jpg',
                'genre_id' => 1,
                'author_id' => 3,
            ],
            [
                'title' => 'Laskar Pelangi',
                'description' => 'Novel inspiratif karya Andrea Hirata.',
                'price' => 110000,
                'stock' => 20,
                'cover_photo' => 'laskar_pelangi.jpg',
                'genre_id' => 3,
                'author_id' => 4,
            ],
            [
                'title' => 'Bumi Manusia',
                'description' => 'Novel klasik karya Pramoedya Ananta Toer.',
                'price' => 130000,
                'stock' => 12,
                'cover_photo' => 'bumi_manusia.jpg',
                'genre_id' => 4,
                'author_id' => 5,
            ],
        ]);
    }
}
