<?php

use Illuminate\Database\Seeder;

class AppliedTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applied_tags')->insert([
            'id' => 1,
            'project_id' => 1,
            'tag_id' => 1
        ]);
    }
}
