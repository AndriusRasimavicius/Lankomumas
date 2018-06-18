<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Club extends Model
{
    public function students(){
    	return $this->belongsToMany('App\Models\Student', 'registrations');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function lessons(){
    	return $this->hasMany('App\Models\Lesson');
    }
}
