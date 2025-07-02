<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 3 projects
        \App\Models\Project::factory(3)->create();
        // Create 5 inquiries
        \App\Models\Inquiry::factory(5)->create();
    }
}
