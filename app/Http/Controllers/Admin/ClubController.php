<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Club;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClubValidator;



class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::all()->where('deleted', '0')->paginate(10);

        return view ('admin.club', ['clubs' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newClub');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClubValidator $request)
    {
        $clubs = New Club();
        $clubs->year=$request->year;
        $clubs->quarter=$request->quarter;
        $clubs->name=$request->name;
        $clubs->address=$request->address;
        $clubs->type=$request->type;
        $clubs->save();
        return redirect()->route('clubs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        $users = User::all();
        return view('admin.editClub', ['club' => $club, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(ClubValidator $request, Club $club)
    {

        $club->year=$request->year;
        $club->quarter=$request->quarter;
        $club->name=$request->name;
        $club->address=$request->address;
        $club->type=$request->type;
        $club->user_id=$request->user_id;
        $club->save();
        return redirect()->route('clubs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
    }
    public function deleted ($id)
    {
        $club=Club::find($id);
        $club->deleted=1;
        $club->save();
        return redirect()->route('clubs.index');
    }
}
