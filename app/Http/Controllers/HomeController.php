<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\BusSchedule;
use App\Booking;
use App\Station;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('customer.index', ['layout' => 'index']);
    }

    public function enquiry(Request $request)
    {
        $source = ucfirst($request->source);
        $dest = ucfirst($request->destination);
        $date = $request->travel_date;

        $buses = Bus::all();

        $schedules = DB::table('bus_schedules')
            ->whereJsonContains('stations', $source)
            ->Where('depart_date', '=', $date)
            // ->orWhere('source', 'like', '%' . Input::get('source') . '%')
            ->whereJsonContains('stations', $dest)
            ->paginate(10);

        return view('customer.index', ['schedules' => $schedules, 'layout' => 'schedules', 'buses' => $buses, 'source' => $source, 'dest' => $dest, 'date' => $date]);
    }

    public function showall(Request $request)
    {
        $schedules = DB::table('bus_schedules')->paginate(10);
        $buses = Bus::get();
        return view('customer.index', ['schedules' => $schedules, 'layout' => 'allSchedules', 'buses' => $buses]);
    }
}