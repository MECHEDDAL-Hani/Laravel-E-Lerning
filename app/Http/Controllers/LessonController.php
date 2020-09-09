<?php

namespace App\Http\Controllers;

use App\Model\Lesson;
use App\Model\Resource;
use App\Model\Teacher;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view("teacher.lessoncreeat" , ['id' => $id]);
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
        $resource = New Resource();
        $resource->title = $request->input('title');
        $resource->description = $request->input('description');
        $resource->content = $request->input('content');
        $resource->course_id = intval($request->input('id_course'));
        $resource->save();


        $lesson = new Lesson();
        $lesson->resource_id = $resource->id;
        $lesson->published = true;
        $lesson->position = 0;
        $lesson->save();

        return redirect()->route('course.info' , [$request->input('id_course')]);
        
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id, $resource_id)
    {
        //
        $lesson = Lesson::find($resource_id);
        return view("teacher.showlesson", ['id' => $id, 'lesson' => $lesson]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $resource_id)
    {
        //
        $lesson = Lesson::find($resource_id);
        return view("teacher.lessonupdate", ['id' => $id, 'lesson' => $lesson]);
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
     * @param  \App\Model\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
