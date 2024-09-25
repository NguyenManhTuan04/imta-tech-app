<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('subscriptions')->insert([
            [
                'user_id' => 1,
                'start_date' => now()->subMonth(),
                'end_date' => now()->addMonth(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

