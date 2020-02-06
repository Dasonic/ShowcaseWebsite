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
        factory('App\News', 10)->create();
        $this->call(TagsListTableSeeder::class);
		// $this->call(NewsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
