<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Fuel_Stations_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'station_name' => 'LukOil',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'station_name' => 'StatOil',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'station_name' => 'OrlenLietuva',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($data as $value) {
            \App\FuelStation::create($value);
        }
    }
}
