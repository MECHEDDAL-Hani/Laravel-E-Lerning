<?php

namespace App\Http\Controllers;

use App\Model\Teacher;
use App\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }


    /**
     * chech if user is Teacher
     *
     * @param  $id of user
     * @return bool
     */
    public static function isTeacher($id)
    {
        return Teacher::find($id);
    }

    public static function TechernotAdmin()
    {
        $teachers = Teacher::all();
        $teachernotadmin = array();

        for ($i = 0; $i < count($teachers); $i++) {
            $teacher = Teacher::find($teachers[$i]->student_id, 'student_id');
            if (!AdminController::isAdmin($teacher->student_id)) {
                array_push($teachernotadmin, $teacher);
            }
        }

        return $teachernotadmin;
    }
}
