<?php

use Illuminate\Database\Seeder;

class DiscoveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('discovery')->insert([
            'id'=> '1',
            'location_id' => '1',
            'player_id' => '1',
        ]);

        DB::table('discovery')->insert([
            'id'=> '2',
            'location_id' => '2',
            'player_id' => '1',
        ]);

        DB::table('discovery')->insert([
            'id'=> '3',
            'location_id' => '3',
            'player_id' => '1',
        ]);

        DB::table('discovery')->insert([
            'id'=> '4',
            'location_id' => '1',
            'player_id' => '2',
        ]);

        DB::table('discovery')->insert([
            'id'=> '5',
            'location_id' => '2',
            'player_id' => '2',
        ]);


    }
}
