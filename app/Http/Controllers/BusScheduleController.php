<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusSchedule;
use App\Bus;
use App\Station;
use Session;

class BusScheduleController extends Controller
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
        $schedules = BusSchedule::orderBy('created_at', 'asc')->paginate(5);
        $buses = Bus::all();
        $stations = Station::all();
        return view('admin.schedules.schedule-list', compact('schedules', 'buses', 'stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schedules = BusSchedule::all();
        $buses = Bus::all();
        $stations = Station::all();
        return view('admin.schedules.edit-schedule', compact('schedules', 'buses', 'stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['return_date'])){
                $data['return_date'] = '';
            }
            $this->validate($request, 
            [
                'bus_id'=>'required',
                'depart_date'=>'required',
                'return_date'=>'required',
                'depart_time'=>'required',
                'return_time'=>'required',
                'pickup_address'=>'required',
                'dropoff_address'=>'required',
                'stations'    =>     'required',
                'price'    =>     'required',
                // 'status'=>'required'
            ]);

            $schedule = new BusSchedule;

            $schedule->bus_id = $data['bus_id'];
            $schedule->depart_date = $data['depart_date'];
            $schedule->return_date = $data['return_date'];
            $schedule->depart_time = $data['depart_time'];
            $schedule->return_time = $data['return_time'];
            $schedule->pickup_address = ucfirst($data['pickup_address']);
            $schedule->dropoff_address = ucfirst($data['dropoff_address']);
            $schedule->stations = $data['stations'];
            $schedule->price = $data['price'];
            $schedule->created_at = date('Y-m-d H:i:s');
            $schedule->updated_at = date('Y-m-d H:i:s');
            
            if(isset($data['status'])){
                $schedule->status = 1;
            }else{
                $schedule->status = 0;
            }

            $schedule->save();
            Session::flash('msg', 'New Schedule Created Successfully');

            return redirect('/admin/bus-schedule');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = BusSchedule::find($id);
        $checkpoints = json_decode($schedule->stations);
        return view('admin.schedules.show-schedule', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = BusSchedule::find($id);
        $schedules = BusSchedule::all();
        $buses = Bus::all();
        $stations = Station::all();
        return view('admin.schedules.edit-schedule', compact('schedule', 'schedules', 'buses', 'stations'));
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
        $this->validate($request, 
        [
            'bus_id'=>'required',
            'depart_date'=>'required',
            'return_date'=>'required',
            'depart_time'=>'required',
            'return_time'=>'required',
            'pickup_address'=>'required',
            'dropoff_address'=>'required',
            'stations'    =>     'required',
            'price'    =>     'required',
            // 'status'=>'required'
        ]);

        $schedule = BusSchedule::find($id);

        $schedule->bus_id = $request->bus_id;
        $schedule->depart_date = $request->depart_date;
        $schedule->return_date = $request->return_date;
        $schedule->depart_time = $request->depart_time;
        $schedule->return_time = $request->return_time;
        $schedule->pickup_address = ucfirst($request->pickup_address);
        $schedule->dropoff_address = ucfirst($request->dropoff_address);
        $schedule->stations = $request->stations;
        $schedule->price = $request->price;
        
        if(isset($request->status)){
            $schedule->status = 1;
        }else{
            $schedule->status = 0;
        }

        $schedule->save();
        Session::flash('msg', 'Schedule Updated Successfully');

        return redirect('/admin/bus-schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = BusSchedule::find($id);
        $schedule->delete();
        Session::flash('msg', 'Schedule Deleted Successfully');
        return redirect('/admin/bus-schedule');
    }
}