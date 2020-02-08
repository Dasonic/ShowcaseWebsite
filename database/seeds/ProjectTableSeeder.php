<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'title' => "Showcase Website",
            'description' => "A small website that showcases past and current projects.",
            'link' => "https://github.com/Dasonic/ShowcaseWebsite",
            'last_updated_at' => '20/02/06'
        ]);
        DB::table('projects')->insert([
            'title' => "Rameroids",
            'description' => "A game (similar to Asteroids) designed to demonstrate use of my graphics engine built from scratch in c++ using OpenGL",
            'link' => "https://github.com/Dasonic/3802ICT/tree/master/Assignment%201",
            'last_updated_at' => '19/09/15'
        ]);
    }
}
