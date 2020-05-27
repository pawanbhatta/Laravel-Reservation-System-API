<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Bus;
use Session;
use DB;

class BusController extends Controller
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
        $buses = Bus::orderBy('created_at', 'asc')->paginate(5);
        return view('admin.buses.bus-list', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buses.add-bus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [
            'bus_name'=>'required',
            'total_seats'=>'required',
            'phone'     =>  'required',
            'seats'   =>  'nullable',
            // 'seats_booked'  =>  'nullable',
            'bus_num'       =>  'required',
            'bus_image' => 'image|nullable|max:2048',
        ]);
        

        // Handle file upload 
        if($request->hasFile('bus_image')){
            // Get filename with extension
            $fileNameWithExt = $request->file('bus_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Ext
            $extension = $request->file('bus_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('bus_image')->storeAs('public/bus_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $bus = new Bus;

        $bus->bus_name = $request->bus_name;
        $bus->bus_num = $request->bus_num;
        $bus->phone = $request->phone;
        $bus->seats = $request->seats;
        // $bus->seats_booked = $request->seats_booked;
        $bus->total_seats = $request->total_seats;
        $bus->bus_image = $fileNameToStore;
        // $bus->status = $request->status;

        if(isset($request->status)){
            $bus->status = 1;
        }else{
            $bus->status = 0;
        }

        // dd($bus);
        
        $bus->save();
        Session::flash('msg', 'New Bus Created Successfully!');
        return redirect('/admin/bus');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $bus = Bus::find($id);
        // return view('admin.buses.bus-view', compact( 'bus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Bus::find($id);
        return view('admin.buses.edit-bus', compact('bus'));
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
        $bus = Bus::find($id);

        $this->validate($request, 
        [
            'bus_name'      =>    'required',
            'total_seats'   =>    'required',
            'phone'         =>    'required',
            // 'seats_avail'   =>  'nullable',
            'seats'  =>  'nullable',
            'bus_num'       =>  'required',
            'bus_image'     => 'image|nullable|max:2048',
        ]);
        

        // Handle file upload 
        if($request->hasFile('bus_image')){
            // Get filename with extension
            $fileNameWithExt = $request->file('bus_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just Ext
            $extension = $request->file('bus_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('bus_image')->storeAs('public/bus_images', $fileNameToStore);

            $bus->bus_image = $fileNameToStore;
        }

        $bus->bus_name = $request->bus_name;
        $bus->bus_num = $request->bus_num;
        $bus->phone = $request->phone;
        $bus->total_seats = $request->total_seats;
        $bus->seats = $request->seats;
        // $bus->seats_booked = $request->seats_booked;

        if(isset($request->status)){
            $bus->status = 1;
        }else{
            $bus->status = 0;
        }
        
        $bus->save();
        Session::flash('msg', 'Bus Info Updated Successfully!');
        return redirect(route('bus.index'));//->with('success', 'Bus Info Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus = Bus::find($id);
        if($bus->bus_image!='noimage.jpg'){
            // Delete Image
            Storage::delete('public/bus_images/'.$bus->bus_image);
        }
        $bus->delete();
        Session::flash('msg', 'Bus Deleted Successfully!');
        return redirect('/admin/bus');//->with('success', 'Bus Deleted Successfully');
    }
}