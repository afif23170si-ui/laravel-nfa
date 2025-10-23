<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('transactions')->insert([
            [
                'user_id' => 2, // customer user
                'book_id' => 1, // Harry Potter
                'quantity' => 2,
                'total_price' => 300000, // 2 x 150000
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'book_id' => 3, // Game of Thrones
                'quantity' => 1,
                'total_price' => 180000,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'book_id' => 5, // Bumi Manusia
                'quantity' => 3,
                'total_price' => 390000,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
