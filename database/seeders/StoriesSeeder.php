<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoriesSeeder extends Seeder
{
    public function run():void
    {
        DB::table('stories')->insert([
            [
                'title' => 'Epic Fantasy Story',
                'author' => 'John Doe',
                'description' => 'Một câu chuyện kỳ ảo với nhiều tình tiết ly kỳ.',
                'genre_id' => 1,
                'cover_image' => 'fantasy_cover.jpg',
                'premium' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Romantic Love Story',
                'author' => 'Jane Smith',
                'description' => 'Một câu chuyện tình yêu lãng mạn.',
                'genre_id' => 2,
                'cover_image' => 'romance_cover.jpg',
                'premium' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

