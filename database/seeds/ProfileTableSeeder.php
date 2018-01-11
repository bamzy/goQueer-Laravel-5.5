<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->insert([
            'id'=> '1',
            'description' => 'Edmonton\'s Queer History',
            'name' => 'Edmonton',
            'lat' => '53.557811408',
            'lng' => '-113.46774101257326',
            'show' => true
        ]);

        DB::table('profile')->insert([
            'id'=> '2',
            'description' => 'Orlando',
            'name' => 'just dreamy',
            'lat' => '28.545053',
            'lng' => '-81.382149',
            'show' => true
        ]);



    }
}
