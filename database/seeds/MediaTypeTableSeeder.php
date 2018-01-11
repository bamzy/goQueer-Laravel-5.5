<?php

use Illuminate\Database\Seeder;

class MediaTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_type')->insert([
            'id'=> '1',
            'name' => 'Video',
        ]);

        DB::table('media_type')->insert([
            'id'=> '2',
            'name' => 'Sound',
        ]);

        DB::table('media_type')->insert([
            'id'=> '3',
            'name' => 'PDF',
        ]);

        DB::table('media_type')->insert([
            'id'=> '4',
            'name' => 'Image',
        ]);

        DB::table('media_type')->insert([
            'id'=> '5',
            'name' => 'None',
        ]);
    }
}
