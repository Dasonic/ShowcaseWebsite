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
        factory('App\News', 20)->create();
        $this->call(TagsListTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(AppliedTagsTableSeeder::class);
        $this->call(ScreenshotTableSeeder::class);
        $this->call(UserTableSeeder::class);
		// $this->call(NewsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
