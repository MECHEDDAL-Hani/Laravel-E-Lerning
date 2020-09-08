<?php

namespace App\Http\Controllers;

use App\Model\Exam;
use App\Model\Practice;
use App\Model\Resource;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        return view("teacher.examcreeat", ['id' => $id]);
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
        $resource = new Resource();
        $resource->title = $request->input('title');
        $resource->description = $request->input('description');
        $resource->content = $request->input('content');
        $resource->course_id = intval($request->input('id_course'));
        $resource->save();

        $practice = new Practice();
        $practice->resource_id = $resource->id;
        $practice->save();

        $exam = new Exam();
        $exam->practice_id = $practice->resource_id;
        $exam->save();

        return redirect()->route('course.info', [$request->input('id_course')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $practice_id)
    {
        //
        $exam = Exam::find($practice_id);
        return view("teacher.examupdate", ['id' => $id, 'exam' => $exam]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $resource = Resource::find($request->input('resource_id'));
        $resource->title = $request->input('title');
        $resource->description = $request->input('description');
        $resource->content = $request->input('content');
        $resource->save();

        return redirect()->route('course.info', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
