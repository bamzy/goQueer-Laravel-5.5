<?php

use Illuminate\Database\Seeder;

class SetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sets')->insert([
            'id'=> '1',
            'description' => 'Demo1 Description',
            'name' => 'Demo1',
        ]);

        DB::table('sets')->insert([
            'id'=> '4',
            'description' => 'Demo2 Description',
            'name' => 'Demo2',
        ]);



    }
}
