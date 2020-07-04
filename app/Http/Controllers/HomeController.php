<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        if(AdminController::isAdmin(Auth::id()))
         return view('admin.dashboard');
        if(TeacherController::isTeacher(Auth::id())) 
         return view('teacher.dashboard');
        if(StudentController::isStudent(Auth::id())) 
         return view('student.dashboard');

    }
}
