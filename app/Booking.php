<?php

namespace App;
use App\Bus;
use App\User;
use App\BusSchedule;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['customer_id', 'bus_id', 'pid', 'schedule_id', 'seats_booked', 'total_price', 'status', 'source', 'destination'];
    protected $primaryKey = 'booking_id';

    protected $casts = [
        'seats_booked'  =>  'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedule()
    {
        return $this->belongsTo(BusSchedule::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function saveSeats()
    {
        $buses = Bus::all();
        foreach ($buses as $bus) {
            $bus->seats = array();
            if($bus->bus_id == $this->bus_id){
                foreach ($this->seats_booked as $seat) {
                    array_push($bus->seats, $seat);
                }   
                $bus->seats = array_unique($bus->seats);
            }
        }
        
    }
}