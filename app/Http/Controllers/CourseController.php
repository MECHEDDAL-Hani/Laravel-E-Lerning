<?php

namespace App\Http\Controllers;

use App\Model\Course;
use App\Model\Exam;
use App\Model\Exercise;
use App\Model\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('courses', ['courses' => Course::with('teacher')->get()]);
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
        $validateDate = $request->validate([
            'title' => 'required|max:255',     
        ]);
        
        $course = new Course();
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->teacher_id = $request->input('teacher_id');
        $course->save();

        session()->flash('CreeatCourse', 'The Course created successfully');

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Course::destroy($request->input('id'));  
        session()->flash('DestroyCourse', 'The Course has deleted successfully');

        return redirect(route('home')); 
    }

    public function info($id)
    {
        return
            view('teacher.courseinfo', ['id' => $id , 'lessons' => Lesson::with('resource')->get(), 'exercises' => Exercise::with('practice')->get(), 'exams' => Exam::with('practice')->get()]);
    }

    public function info2($id)
    {
        return
            view('student.courseinfo', ['id' => $id, 'lessons' => Lesson::with('resource')->get(), 'exercises' => Exercise::with('practice')->get(), 'exams' => Exam::with('practice')->get()]);
    }
}
