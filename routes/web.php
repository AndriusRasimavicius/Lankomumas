<?php
use Illuminate\Support\Collection;
use App\Models\Club;
use App\Models\Lesson;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::resource('club.student', 'StudentController');
Route::resource('club.lesson', 'LessonController');
Route::resource('club', 'ClubController');
Route::post('/club', 'StudentController@priskirti')->name('priskirti');
Route::post('/clubss', 'StudentController@pasalinti')->name('pasalinti');
Route::get('/attendance/{id}', 'LessonController@lankomumas')->name('attendance');
Route::post('/attended/{id}', 'LessonController@attendance')->name('attended');




