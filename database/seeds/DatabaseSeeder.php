<?php

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
        $this->call([
            UsersTableSeeder::class,
            PostTableSeeder::class,
            SubjectTableSeeder::class,
            TagTableSeeder::class,
            PostTagTableSeeder::class
        ]);
    }
}
