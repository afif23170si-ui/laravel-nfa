<?php

namespace App\Models;

class Author
{
    public static function all()
    {
        return [
            ['id' => 1, 'name' => 'J.K. Rowling', 'nationality' => 'British'],
            ['id' => 2, 'name' => 'Haruki Murakami', 'nationality' => 'Japanese'],
            ['id' => 3, 'name' => 'George Orwell', 'nationality' => 'British'],
            ['id' => 4, 'name' => 'Tere Liye', 'nationality' => 'Indonesian'],
            ['id' => 5, 'name' => 'Stephen King', 'nationality' => 'American'],
        ];
    }
}
