<?php

namespace App\Http\Controllers;

use App\Model\Exercise;
use App\Model\Practice;
use App\Model\Resource;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        return view("teacher.exercisecreat", ['id' => $id]);
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
        $practice->resource_id=$resource->id;
        $practice->save();

        $exercise = new Exercise();
        $exercise->practice_id = $practice->resource_id;
        $exercise->save();

        return redirect()->route('course.info', [$request->input('id_course')]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
