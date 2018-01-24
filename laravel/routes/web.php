<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function(){
    return view('about');
});

//
// Radaru marsrutai
/* Route::get('radars', function () {

    $radars = DB::table('radars')->get();
    return view('radars.index', compact('radars'));
    
});

Route::get('radar/{id}', function ($id) {

    $radar = DB::table('radars')->find($id);
    return view('radars.show', compact('radar'));
    
});

Route::get('radar/{number}', function($number){

    $radar = \App\Radar::where('number', $number)->first();
    return view('radars.show', compact('radar'));

}); */

//Route::resource('radars', 'RadarsController');
Route::get('radars', 'RadarsController@index')->name('radars.index');
Route::get('radars/create', 'RadarsController@create')->name('radars.create');
Route::post('radars', 'RadarsController@store')->name('radars.store');
Route::get('radars/{radar}', 'RadarsController@show');
Route::get('radars/{radar}/edit', 'RadarsController@edit')->name('radars.edit');
Route::put('radars/{radar}', 'RadarsController@update')->name('radars.update');
Route::delete('radars/{radar}', 'RadarsController@destroy')->name('radars.destroy');

//
// Vairuotoju marsrutai
/* Route::get('drivers', function(){

    $drivers = DB::table('drivers')->get();
    return view('drivers.index', compact('drivers'));

});

Route::get('driver/{id}', function ($id) {

    //$driver = DB::table('drivers')->find($id);
    $driver = \App\Driver::where('driver_id', $id)->first();
    return view('drivers.show', compact('driver'));
    
}); */

//Route::resource('drivers', 'RadarsController');
Route::get('drivers', 'DriversController@index')->name('drivers.index');
Route::get('drivers/create', 'DriversController@create')->name('drivers.create');
Route::post('drivers', 'DriversController@store')->name('drivers.store');
Route::get('drivers/{driver}', 'DriversController@show');
Route::get('drivers/{driver}/edit', 'DriversController@edit')->name('drivers.edit');
Route::put('drivers/{driver}', 'DriversController@update')->name('drivers.update');
Route::delete('drivers/{driver}', 'DriversController@destroy')->name('drivers.destroy');

//
// Degaliniu marsrutai
Route::get('fuel_stations', function(){

    $fuelStations = \App\FuelStation::all();
    return view('fuel_stations.index', compact('fuelStations'));

});

Route::get('fuel_station/{id}', function ($id) {

    $fuelStation = \App\FuelStation::find($id);
    return view('fuel_stations.show', compact('fuelStation'));
    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
