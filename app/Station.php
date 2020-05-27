<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table = 'stations';
    protected $fillable = ['admin_id', 'name', 'status'];
    protected $primaryKey = 'id';

    public function schedule()
    {
        return $this->belongsTo(App\BusSchedule::class);
    }
}