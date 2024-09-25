<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genres')->insert([
            ['name' => 'Fantasy', 'description' => 'Thể loại kỳ ảo', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Romance', 'description' => 'Thể loại lãng mạn', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Horror', 'description' => 'Thể loại kinh dị', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}


