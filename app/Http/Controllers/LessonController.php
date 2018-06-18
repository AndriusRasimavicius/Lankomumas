<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests\LessonValidator;
use Illuminate\Support\Facades\Gate;


class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($club)
    {   
        $club=Club::find($club);
        if (Gate::denies('club_users', $club)) {
            return redirect()->route('club.index');
        }else
        {
        $lessons=Lesson::where('club_id', $club->id)->orderBy('date', 'desc')->get()->paginate(10);
        return view ('lesson', ['club' => $club, 'lessons' => $lessons]);
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($club)
    {
        return view('newLesson', ['club'=>$club]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonValidator $request, $club)
    {
        $lessons = New Lesson();
        $lessons->club_id=$club;
        $lessons->date=$request->date;
        $lessons->save();

        $club= Club::find($club);
        $lesson=Lesson::find($lessons->id);
        $lesson->students()->attach($club->students);


        return redirect()->route('club.lesson.index', ['club' => $club]);
    }
       
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club, Lesson $lesson)
    {
        return view('editLesson', ['lesson' => $lesson ,'club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(LessonValidator $request, Club $club,Lesson $lesson)
    {
        $lesson->date=$request->date;
        $lesson->save();
        return redirect()->route('club.lesson.index' ,['club'=>$club]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
    public function lankomumas($id)
    {

        $students= Student::all();
        $lesson= Lesson::find($id);
    
        return view ('attendance', ['students' => $students, 'lesson'=>$lesson]);

    }
    public function attendance(Request $request, $id)
    {

       $lesson= Lesson::find($id);
       $ids= $lesson->students()->allRelatedIds();
      
       foreach ($ids as $id){

        $lesson->students()->updateExistingPivot($id, ['attended' => $request->attended[$id] ]);
       }
        return redirect()->route('club.index');
    }
}
