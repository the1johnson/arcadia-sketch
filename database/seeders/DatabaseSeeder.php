<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ArcadeSeeder;

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
            ArcadeSeeder::class,
            GameSeeder::class,
        ]);
    }
}
