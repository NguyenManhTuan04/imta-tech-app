<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChaptersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chapters')->insert([
            [
                'story_id' => 1,
                'title' => 'Chương 1: Khởi đầu',
                'content' => 'Đây là nội dung của chương đầu tiên trong câu chuyện kỳ ảo.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'story_id' => 2,
                'title' => 'Chương 1: Cuộc gặp gỡ đầu tiên',
                'content' => 'Nội dung của chương đầu tiên trong câu chuyện tình yêu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

