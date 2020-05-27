<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;
use App\BusSchedule;
use Session;
use DB;
use Auth;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $stations = DB::table('stations')->paginate(10);
        $schedules = BusSchedule::all();
        return view('admin.stations.stations-list', compact('stations', 'schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all();
        return view('admin.stations.add-station', compact('stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required',
        ]);

        $station = new Station;

        $station->name = $request->name;
        $station->admin_id = Auth::id();
        if (isset($request->status)) {
            $station->status = 1;
        } else {
            $station->status = 0;
        }

        $station->save();
        Session::flash('msg', 'New Station Created Successfully');
        return redirect(route('station.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $station = Station::find($id);
        return view('admin.stations.station-view', compact('station'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station = Station::find($id);
        return view('admin.station.edit-station', compact('station'));
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
        $this->validate($request, [
            'name'  =>  'required',
        ]);

        $station = Station::find($id);

        $station->name = $request->name;
        $station->admin_id = Auth::id();
        if (isset($request->status)) {
            $station->status = 1;
        } else {
            $station->status = 0;
        }

        $station->save();
        Session::flash('msg', 'Station Updated Successfully');
        return redirect(route('station.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $station = Station::find($id);
        $station->delete();
        Session::flash('msg', 'Station Info Deleted Successfully');
        return redirect(route('station.index'));
    }
}