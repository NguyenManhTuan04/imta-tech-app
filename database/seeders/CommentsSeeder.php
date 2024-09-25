<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'chapter_id' => 1,
                'user_id' => 1,
                'comment' => 'Câu chuyện này rất hấp dẫn!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'chapter_id' => 2,
                'user_id' => 2,
                'comment' => 'Tôi rất thích chương này.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

