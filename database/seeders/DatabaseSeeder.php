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
        \App\Models\presentation::factory()->count(5)->create();
        \App\Models\product::factory()->count(20)->create();
        \App\Models\input::factory()->count(50)->create();
        \App\Models\supply::factory()->count(60)->create();
    }
}
