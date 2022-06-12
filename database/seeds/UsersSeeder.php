<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
                'name' => '307509',
                'username' => '307509',
                'email' => 'super@admin.com',
                'password' => bcrypt('password'),
                'level' => '307509',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'name' => '309076',
                'username' => '309076',
                'email' => 'super@admin.com',
                'password' => bcrypt('password'),
                'level' => '309076',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
