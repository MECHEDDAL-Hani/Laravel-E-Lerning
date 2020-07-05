<?php

namespace App\Http\Controllers;

use App\Model\Student;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
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
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public static function newStudentFromRegister($user_id)
    {
        //
        $Student = new Student();
        $Student->user_id = $user_id;
        $Student->save();
    }

    /**
     * chech if user is Student
     *
     * @param  $id of user
     * @return bool
     */
    public static function isStudent($id)
    {
        return Student::find($id);
    }

    public static function StudentnotTecher()
    {
        $students = Student::all();
        $studentnotteachr = array();

        for ($i = 0; $i < count($students); $i++) {
            $student = Student::find($students[$i]->user_id, 'user_id');
            if (!TeacherController::isTeacher($student->user_id)) {
                array_push($studentnotteachr, $student);
            }
        }
        
        return $studentnotteachr;
    }
}
