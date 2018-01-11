<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('user')->insert([
            'id'=> '1',
            'name' => 'aaa',
            'email' => 'aaa@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => '2',
        ]);

        DB::table('user')->insert([
            'id'=> '2',
            'name' => 'bbb',
            'email' => 'bbb@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => '2',
        ]);
    }
}
