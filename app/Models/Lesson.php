<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function students(){
    	return $this->belongsToMany('App\Models\Student', 'attendance');
    }
    public function club(){
    	return $this->belongsTo('App\Models\Club');
    }
}
