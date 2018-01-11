<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('location')->insert([
            'id'=> '1',
            'coordinate' => '{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[-113.6036539077759,53.515741119665684],[-113.6036539077759,53.515741119665684],[-113.60373973846437,53.51681284304222],[-113.60373973846437,53.51681284304222],[-113.60721588134767,53.51660870734615],[-113.60721588134767,53.51660870734615],[-113.60760211944581,53.51571560211204],[-113.60760211944581,53.51571560211204],[-113.60367536544801,53.515750688744355],[-113.60365927219392,53.515741119665684],[-113.60365927219392,53.515741119665684],[-113.60613226890564,53.51622913992179],[-113.6036539077759,53.515741119665684]]]}}',
            'name' => 'Restaurant',
            'description' => 'Restaurant',
            'address' => 'White Ave, 99 st',
            'user_id' => 1,
            'gallery_id' => 1,
            'profile_id' => 1

        ]);


        DB::table('location')->insert([
            'id'=> '2',
            'coordinate' => '{"type":"Feature","properties":{},"geometry":{"type":"Point","coordinates":[-113.52760791778564,53.54856947589931]}}',
            'name' => 'Marker Near St. Joachim Catholic Cemetery',
            'description' => 'Marker Near St. Joachim Catholic Cemetery',
            'address' => '119 St NW and 106 Avenue NW',
            'user_id' => 1,
            'gallery_id' => 1,
            'profile_id' => 1

        ]);


        DB::table('location')->insert([
            'id'=> '3',
            'coordinate' => '{"type":"Feature","properties":{},"geometry":{"type":"Point","coordinates":[-113.48814725875856,53.518828630232385]}}',
            'name' => 'Near My House',
            'description' => 'Very Near to My House!!!',
            'address' => '99 St. NW and Whyte Ave',
            'user_id' => 1,
            'gallery_id' => 1,
            'profile_id' => 1

        ]);


        DB::table('location')->insert([
            'id'=> '4',
            'coordinate' => '{"type":"Feature","properties":{},"geometry":{"type":"Polygon","coordinates":[[[-113.49696636199953,53.50027466495581],[-113.49696636199953,53.50144888422146],[-113.49507808685304,53.50144888422146],[-113.49507808685304,53.50027466495581],[-113.49696636199953,53.50027466495581]]]}}',
            'name' => 'dummy 3 south',
            'description' => 'dummy 3 south',
            'address' => '99 St. NW and Whyte Ave',
            'user_id' => 1,
            'gallery_id' => 1,
            'profile_id' => 1


        ]);


    }
}
