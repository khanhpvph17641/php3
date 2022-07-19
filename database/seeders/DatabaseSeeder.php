<?php

namespace Database\Seeders;
use  \App\Models\User;
use  \App\Models\Classroom;
use  \App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Classroom::factory(10)->create();
        Post::factory(10)->create();
    }
}
