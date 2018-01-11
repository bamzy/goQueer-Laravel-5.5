<?php

use Illuminate\Database\Seeder;

class HintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('hint')->insert([
            'id'=> '1',
            'content' => 'go that way',
            'location_id' => '1',
        ]);

        DB::table('hint')->insert([
            'id'=> '2',
            'content' => 'go south a bit more',
            'location_id' => '2',
        ]);

        DB::table('hint')->insert([
            'id'=> '3',
            'content' => 'this is the new hint',
            'location_id' => '4',
        ]);
    }
}
