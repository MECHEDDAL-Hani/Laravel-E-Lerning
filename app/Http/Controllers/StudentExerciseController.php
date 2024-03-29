<?php

namespace App\Http\Controllers;

use App\Model\Reponce;
use App\Model\StudentExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
        $reponce =  new Reponce();
        $reponce->answare = $request->input('answare');
        $reponce->save();

        $studentexercise = new StudentExercise();
        $studentexercise->exercise_id = intval($request->input('exercise_id'));
        $studentexercise->student_id = Auth::id();
        $studentexercise->reponce_id = $reponce->id ;
        $studentexercise->save();

        return redirect(route('course.info2' , ['id' => $request->input('id')]));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id , $practice_id)
    {
        //
        $soulitions = StudentExercise::where('exercise_id', $practice_id)->with('reponce')->get();
       // dd($soulitions);
        return view('teacher.seeproposedsolutions' , ['id'=>$id, 'soulitions'=> $soulitions ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentExercise  $studentExercise
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentExercise $studentExercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\StudentExercise  $studentExercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $practice_id)
    {
        //
        $reponce = Reponce::find($request->input('id'));
        $reponce->notice = $request->input('notice');
        $reponce->status = 1;
        $reponce->save();

        $studentexercise = StudentExercise::find($request->input('exerciseid'));
        $studentexercise->status = 1;
        $studentexercise->save();
        
        $soulitions = StudentExercise::where('exercise_id', $practice_id)->with('reponce')->get();
        return view('teacher.seeproposedsolutions', ['id' => $id, 'soulitions' => $soulitions]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentExercise  $studentExercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentExercise $studentExercise)
    {
        //
    }
}
