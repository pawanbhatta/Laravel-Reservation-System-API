<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['title', 'description', 'due'];
    // protected $guarded = ['user_id'];

    public function creater(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}