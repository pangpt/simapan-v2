<?php

use Illuminate\Database\Seeder;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $now = \Carbon\Carbon::now();
        DB::table('months')->insert([
            [
                'name' => 'Januari',
                'slug' => 'jan',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Februari',
                'slug' => 'feb',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Maret',
                'slug' => 'mar',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'April',
                'slug' => 'apr',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Mei',
                'slug' => 'mei',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Juni',
                'slug' => 'jun',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Juli',
                'slug' => 'jul',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Agustus',
                'slug' => 'agt',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'September',
                'slug' => 'sep',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Oktober',
                'slug' => 'okt',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'November',
                'slug' => 'nov',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => 'Desember',
                'slug' => 'des',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
