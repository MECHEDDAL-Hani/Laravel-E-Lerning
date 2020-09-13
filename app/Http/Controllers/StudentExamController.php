<?php

namespace App\Http\Controllers;

use App\Model\Reponce;
use App\Model\StudentExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentExamController extends Controller
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

        $studentexam = new StudentExam();
        $studentexam->exam_id = intval($request->input('exam_id'));
        $studentexam->student_id = Auth::id();
        $studentexam->reponce_id = $reponce->id;
        $studentexam->save();

        return redirect(route('course.info2', ['id' => $request->input('id')]));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, $practice_id)
    {
        //
        $soulitions = StudentExam::where('exam_id', $practice_id)->with('reponce')->get();
        //dd($soulitions);
        return view('teacher.seeproposedsolutionsexam', ['id' => $id, 'soulitions' => $soulitions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\StudentExam  $studentExam
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentExam $studentExam)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update( $id, $practice_id, Request $request)
    {
        //
        $reponce = Reponce::find($request->input('id'));
        $reponce->notice = $request->input('notice');
        $reponce->status = 1;
        $reponce->save();

        $studentexam = StudentExam::find($request->input('examid'));
        $studentexam->note = $request->input('note');
        $studentexam->status = 1;
        $studentexam->save();

        $soulitions = StudentExam::where('exam_id', $practice_id)->with('reponce')->get();
        //dd($soulitions);
        return view('teacher.seeproposedsolutionsexam', ['id' => $id, 'soulitions' => $soulitions]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\StudentExam  $studentExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentExam $studentExam)
    {
        //
    }
}
