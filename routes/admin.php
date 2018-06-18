<?php

use Illuminate\Support\Collection;
if (Auth::check() && Auth::user()->isAdmin()){
	Auth::routes();
}

Route::resource('clubs', 'ClubController')->MiddleWare('admin');
Route::get('/deleted{id}', 'ClubController@deleted')->name('deleted')->MiddleWare('admin');


