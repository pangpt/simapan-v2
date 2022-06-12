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
        $this->call(
            // MasterSeeder::class,
            // MasterSatkerSeeder::class,
            // UserSeeder::class,
            MonthSeeder::class,
           );
    }
}
