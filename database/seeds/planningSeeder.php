<?php

use Illuminate\Database\Seeder;
use App\Planning;

class planningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      factory(App\Planning::class)->make([10]);
    }
}
