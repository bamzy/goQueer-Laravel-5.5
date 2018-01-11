<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id'=> '1',
            'title' => 'Admin',
            'slug' => 'Administrator',
        ]);

        DB::table('roles')->insert([
            'id'=> '2',
            'title' => 'User',
            'slug' => 'User',
        ]);
    }
}
