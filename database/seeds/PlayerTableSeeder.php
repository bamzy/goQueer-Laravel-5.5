<?php

use Illuminate\Database\Seeder;

class PlayerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('player')->insert([
            'id'=> '1',
            'user_id' => '1',
            'device_id' => '60f8c5fb484d5097',
        ]);

        DB::table('player')->insert([
            'id'=> '2',
            'user_id' => '2',
            'device_id' => 'd56efebcb681ca25',
        ]);


    }
}
