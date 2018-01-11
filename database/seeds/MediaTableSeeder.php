<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media')->insert([
            'id'=> '1',
            'source' => 'Library',
            'description' => 'what was said a long time ago',
            'name' => 'Transcript',
            'filePath' => 'c:\xampp\a.txt',
            'copyright_status_id' => 1,
            'type_id' => 1,
            'user_id' => 1,
            'progress_status_id' => 1,

        ]);


    }
}
