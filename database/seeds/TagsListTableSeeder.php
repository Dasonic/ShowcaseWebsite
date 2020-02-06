<?php

use Illuminate\Database\Seeder;

class TagsListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags_list')->insert([
            'title' => "c++"
        ]);
        DB::table('tags_list')->insert([
            'title' => "laravel"
        ]);
        DB::table('tags_list')->insert([
            'title' => "java"
        ]);
        DB::table('tags_list')->insert([
            'title' => "python"
        ]);
        DB::table('tags_list')->insert([
            'title' => "c#"
        ]);
    }
}
