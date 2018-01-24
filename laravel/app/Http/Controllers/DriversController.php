<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::orderBy('name', 'desc')->paginate(8);

        // rodo ir softdeletintus
        //$drivers = Driver::withTrashed()->orderBy('name', 'desc')->paginate(8);
        
        // rodo tik softdeletintus
        //$drivers = Driver::onlyTrashed()->orderBy('name', 'desc')->paginate(8);
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'city'=>$request->city,
        ];

        Driver::create($data);

        return redirect('drivers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::where('driver_id', $id)->first();
        
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $driver = Driver::where('driver_id', $id)->first();

        $data = [
            'name' => $request->name,
            'city' => $request->city
        ];

        $driver->update($data);

        return redirect('drivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::where('driver_id', $id)->first();

        // soft delete
        //$driver->delete($id);

        // hard delete
        $driver->forceDelete($id);

        return redirect('drivers');
    }
}
