<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RadarsSeeder::class);
        $this->call(DriversSeeder::class);
        $this->call(Fuel_Stations_Seeder::class);
    }
}
