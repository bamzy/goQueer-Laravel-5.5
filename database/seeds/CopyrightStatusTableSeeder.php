<?php

use Illuminate\Database\Seeder;

class CopyrightStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('copyright_status')->insert([
            'id'=> '1',
            'status' => 'Clear for Publish',
        ]);
        DB::table('copyright_status')->insert([
            'id'=> '2',
            'status' => 'Pending Permission',
        ]);
        DB::table('copyright_status')->insert([
            'id'=> '3',
            'status' => 'Not Allowed to Use',
        ]);
        DB::table('copyright_status')->insert([
            'id'=> '4',
            'status' => 'Discarded',
        ]);
    }
}
