<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "admin@mail.com",
            'role' => "admin",
            'password' => bcrypt('123456')
        ]);
        DB::table('users')->insert([
            'name' => "User",
            'email' => "user@mail.com",
            'role' => null,
            'password' => bcrypt('123456')
        ]);
    }
}
