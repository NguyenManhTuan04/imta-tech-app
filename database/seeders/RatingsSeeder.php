<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ratings')->insert([
            [
                'user_id' => 1,
                'story_id' => 1,
                'rating' => 5,
                'comment' => 'Câu chuyện này tuyệt vời!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'story_id' => 2,
                'rating' => 4,
                'comment' => 'Rất hay, nhưng có một số đoạn hơi chậm.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

