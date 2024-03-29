<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
/
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/teacher/delete' , 'TeacherController@destroy')->name('teacher.destroy');
Route::post('/teacher/store', 'TeacherController@store')->name('teacher.store');
Route::post('/teacher/store_2', 'TeacherController@store2')->name('teacher.store2');

Route::post('/Student/delete', 'StudentController@destroy')->name('student.destroy');
Route::post('/Student/store', 'StudentController@store')->name('student.store');

Route::get('/courses', 'CourseController@index')->name('course.index');
Route::post('/courses', 'CourseController@store')->name('course.store');
Route::post('/courses/delete', 'CourseController@destroy')->name('course.destroy');
Route::post('/courses/{$id}', 'CourseController@show')->name('course.show');
Route::get('/course/{id}/info', 'CourseController@info')->name('course.info');

Route::get('/course/{id}/info/newlesson', 'LessonController@index')->name('lesson.creeat');
Route::post('/course/info/newlesson', 'LessonController@store')->name('lesson.store');
Route::get('/course/info/{id}/updatelesson/{resource_id}', 'LessonController@edit')->name('lesson.edit');
Route::post('/course/info/{id}/updatelesson', 'LessonController@update')->name('lesson.update');
Route::get('/course/info/{id}/showlesson/{resource_id}', 'LessonController@show')->name('lesson.show');

Route::get('/course/{id}/info/newexercise', 'ExerciseController@index')->name('exercise.creeat');
Route::post('/course/info/newexercise', 'ExerciseController@store')->name('exercise.store');
Route::get('/course/info/{id}/updateexercise/{practice_id}', 'ExerciseController@edit')->name('exercise.edit');
Route::post('/course/info/{id}/updateexercise', 'ExerciseController@update')->name('exercise.update');
Route::get('/course/info/{id}/showexercise/{practice_id}', 'ExerciseController@show')->name('exercise.show');

Route::get('/course/{id}/info/newexam', 'ExamController@index')->name('exam.creeat');
Route::post('/course/info/newexam', 'ExamController@store')->name('exam.store');
Route::get('/course/info/{id}/updateexam/{practice_id}', 'ExamController@edit')->name('exam.edit');
Route::post('/course/info/{id}/updateexam', 'ExamController@update')->name('exam.update');
Route::get('/course/info/{id}/showexam/{practice_id}', 'ExamController@show')->name('exam.show');

Route::post('/course/{id}/resource', 'ResourceController@destroy')->name('resource.destroy');
Route::post('/course/register', 'StudentCourseController@store')->name('studentcourse.store');

Route::get('/course/{id}/info2', 'CourseController@info2')->name('course.info2');
Route::get('/course/info/{id}/showlesson2/{resource_id}', 'LessonController@show2')->name('lesson.show2');
Route::get('/course/info/{id}/showexercise2/{practice_id}', 'ExerciseController@show2')->name('exercise.show2');
Route::get('/course/info/{id}/showexam2/{practice_id}', 'ExamController@show2')->name('exam.show2');
Route::post('/course/info/studentexercise2', 'StudentExerciseController@store')->name('studentexercise.store');
Route::post('/course/info/studentexam2', 'StudentExamController@store')->name('studentexam.store');

Route::get('/course/info/{id}/showexercise/{practice_id}/seeproposedsolutions', 'StudentExerciseController@show')->name('StudentExercise.show');
Route::post('/course/info/{id}/showexercise/{practice_id}/seeproposedsolutions', 'StudentExerciseController@update')->name('StudentExercise.update');

Route::get('/course/info/{id}/showexam/{practice_id}/seeproposedsolutions', 'StudentExamController@show')->name('StudentExam.show');
Route::post('/course/info/{id}/showexam/{practice_id}/seeproposedsolutions', 'StudentExamController@update')->name('StudentExam.update');





// Route::prefix('admin')->group(function () {
//     Route::get('users', function () {
//         // Matches The "/admin/users" URL
//     });
// }); 


/* 
GET	        /photos	                index	        photos.index
GET	        /photos/create	        create	        photos.create
POST        /photos	                store	        photos.store
GET	        /photos/{photo}	        show	        photos.show
GET	        /photos/{photo}/edit	edit	        photos.edit
PUT/PATCH	/photos/{photo}	        update	        photos.update
DELETE	    /photos/{photo}	        destroy	        photos.destroy 
*/