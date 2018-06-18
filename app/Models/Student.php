<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function clubs(){
    	return $this->belongsToMany('App\Models\Club', 'registration');
    }
    public function lessons(){
    	return $this->belongsToMany('App\Models\Lesson', 'attendance')->withPivot('attended');
    }
}
