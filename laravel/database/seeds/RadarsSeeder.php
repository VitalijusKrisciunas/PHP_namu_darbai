<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RadarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('radars')->insert([
            'date' => '2016-01-01 00:00:00',
            'number' => 'BBB888',
            'distance' => 8000,
            'time' => 400,
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
        DB::table('radars')->insert([
            'date' => '2017-01-02 01:00:00',
            'number' => 'AAA999',
            'distance' => 9000,
            'time' => 500,
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
        DB::table('radars')->insert([
            'date' => '2018-03-02 00:00:00',
            'number' => 'ABB777',
            'distance' => 7000,
            'time' => 300,
            'created_at' => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
    }
}
