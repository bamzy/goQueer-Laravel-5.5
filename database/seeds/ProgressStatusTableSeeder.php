<?php

use Illuminate\Database\Seeder;

class ProgressStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('progress_status')->insert([
            'id'=> '1',
            'status' => 'Draft',
        ]);

        DB::table('progress_status')->insert([
            'id'=> '2',
            'status' => 'Testing',
        ]);

        DB::table('progress_status')->insert([
            'id'=> '3',
            'status' => 'Finalized',
        ]);


    }
}
