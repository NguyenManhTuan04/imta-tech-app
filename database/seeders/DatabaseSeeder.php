<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            GenresSeeder::class,
            StoriesSeeder::class,
            ChaptersSeeder::class,
            CommentsSeeder::class,
            FavoritesSeeder::class,
            SubscriptionsSeeder::class,
            AdsSeeder::class,
            RatingsSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);
    }
}
