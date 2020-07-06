<?php

namespace App\Http\Controllers;

use App\Model\Student;
use App\Model\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $teacher = new Teacher();
        $teacher->student_id = $request->input('id_user');
        $teacher ->save();
        return redirect(route('home'));
    }

    public function store2(Request $request)
    {
        //
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $student = new Student();
        $student->user_id = $user->id;
        $student->save();

        $teacher = new Teacher();
        $teacher->student_id = $user->id;
        $teacher->save();
        
        return redirect(route('home'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        User::destroy($request->input('id_teacher'));
        return redirect( route('home'));
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
