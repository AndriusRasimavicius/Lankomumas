<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Club;
use Illuminate\Http\Request;
use App\Http\Requests\StudentValidator;
use Illuminate\Support\Facades\Gate;




class StudentController extends Controller
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
         $students= Student::all();
        
        return view ('student', ['club' => $club, 'students'=> $students]);
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentValidator $request, $club)
    {
        $students = New Student();
        $students->name=$request->name;
        $students->surname=$request->surname;
        $students->school=$request->school;
        $students->class=$request->class;
        $students->save();


        $club = Club::find($club);
        $club->students()->syncWithoutDetaching($students->id);

        return redirect()->route('club.student.index', ['club' => $club]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club, Student $student)
    {
        return view('editStudent', ['student' => $student ,'club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentValidator $request,Club $club,  Student $student)
    {
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->school=$request->school;
        $student->class=$request->class;
        $student->save();
        return redirect()->route('club.student.index' ,['club'=>$club]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
    public function priskirti(Request $request)
    {
        $club = Club::find($request->club_id);
        $club->students()->syncWithoutDetaching($request->student_id);

        return redirect()->route('club.student.index', ['club'=>$club]);
    }
    public function pasalinti(Request $request)
    {
        $club = Club::find($request->club_id);
        $club->students()->detach($request->student_id);
        return redirect()->route('club.student.index', ['club'=>$club]);
    }
}
