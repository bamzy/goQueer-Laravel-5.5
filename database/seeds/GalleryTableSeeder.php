<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gallery')->insert([
            'id'=> '1',
            'description' => 'Test Gallery',
            'name' => 'Test Gallery',
            'set_id' => '1',


        ]);



    }
}
