<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RadarRequest;
use App\Radar;
use Illuminate\Support\Facades\Auth;
use App\Driver;
use App\Repositories\RadarRepository;

class RadarsController extends Controller
{
    protected $radarRepository;

    public function __construct(RadarRepository $radarRepository)
    {
        $this->radarRepository = $radarRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$radars = Radar::orderBy('date', 'desc')->paginate(5);
        $radars = $this->radarRepository->getAll(5); 

        // rodo ir softdeletintus
        //$radars = Radar::withTrashed()->orderBy('date', 'desc')->paginate(8);
        
        // rodo tik softdeletintus
        //$radars = Radar::onlyTrashed()->orderBy('date', 'desc')->paginate(8);

        return view('radars.index', compact('radars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::all();

        return view('radars.create', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RadarRequest $request)
    {
        if (Auth::check()==true){
            $user = Auth::user();
        } else {
            return redirect('/login');
        }

        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'distance' => $request->distance,
            'time' => $request->time,
            'driver_id' => $request->driverid,
            'user_id' => $user->id            
        ];

        $this->radarRepository->create($data);

        return redirect()->route('radars.index');
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
        $radar = $this->radarRepository->findById($id);

        return view('radars.edit', compact('radar'));
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
        //$radar = $this->radarRepository->findById($id);

        if (Auth::check()==true){
            $user = Auth::user();
        } else {
            return redirect('/login');
        }

        $data = [
            'date' => $request->date,
            'number' => $request->number,
            'distance' => $request->distance,
            'time' => $request->time,
            'user_id' => $user->id
        ];
        
        $this->radarRepository->update($id, $data);

        return redirect()->route('radars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$radar = $this->radarRepository->findById($id);

        // soft delete
        $this->radarRepository->delete($id);

        // hard delete
        //$radar = forceDelete($id);

        return redirect()->route('radars.index');

    }
}