<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ads')->insert([
            [
                'ad_name' => 'Banner Quảng Cáo 1',
                'ad_image' => 'ad_banner_1.jpg',
                'link' => 'https://example.com',
                'position' => 'header',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ad_name' => 'Banner Quảng Cáo 2',
                'ad_image' => 'ad_banner_2.jpg',
                'link' => 'https://example.com',
                'position' => 'sidebar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

