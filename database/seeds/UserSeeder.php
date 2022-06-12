<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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

        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'super@admin.com',
                'password' => bcrypt('password'),
                'level' => '0',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '305709',
                'username' => '305709',
                'email' => 'super@admin.com',
                'password' => bcrypt('password'),
                'level' => '1',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '309076',
                'username' => '309076',
                'email' => 'super@admin.com',
                'password' => bcrypt('password'),
                'level' => '1',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
