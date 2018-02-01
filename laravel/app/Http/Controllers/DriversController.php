<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DriverRequest;
use App\Driver;
use Illuminate\Support\Facades\Auth;
use App\Repositories\DriverRepository;

class DriversController extends Controller
{
    protected $driverRepository;

    public function __construct(DriverRepository $driverRepository)
    {
        $this->driverRepository = $driverRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $drivers = $this->driverRepository->getAll(5);
        //$drivers = Driver::orderBy('name', 'desc')->paginate(5);

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
    public function store(DriverRequest $request)
    {
        if (Auth::check()==true){
            $user = Auth::user();
        } else {
            return redirect('/login');
        }
        
        $data = [
            'name'=>$request->name,
            'city'=>$request->city,
            'user_id' => $user->id
        ];

        $this->driverRepository->create($data);

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
        //$driver = Driver::where('driver_id', $id)->first();
        $driver = $this->driverRepository->findById($id);
        
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

        if (Auth::check()==true){
            $user = Auth::user();
        } else {
            return redirect('/login');
        }

        $data = [
            'name' => $request->name,
            'city' => $request->city,
            'user_id' => $user->id
        ];

        $this->driverRepository->update($id, $data);

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

        // soft delete
        $this->driverRepository->delete($id);

        // hard delete
        //$driver->forceDelete($id);

        return redirect('drivers');
    }
}
