<?php

use Illuminate\Database\Seeder;

class ScreenshotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('screenshots')->insert([
            'project_id' => 1,
            'image_src' => "/storage/showcase-1.png"
        ]);
        DB::table('screenshots')->insert([
            'project_id' => 1,
            'image_src' => "/storage/showcase-2.png"
        ]);
        DB::table('screenshots')->insert([
            'project_id' => 1,
            'image_src' => "/storage/showcase-3.png"
        ]);
        DB::table('screenshots')->insert([
            'project_id' => 2,
            'image_src' => "/storage/fractal_landscape-1.png"
        ]);
        DB::table('screenshots')->insert([
            'project_id' => 2,
            'image_src' => "/storage/fractal_landscape-2.png"
        ]);
        DB::table('screenshots')->insert([
            'project_id' => 2,
            'image_src' => "/storage/fractal_landscape-3.png"
        ]);
    }
}
