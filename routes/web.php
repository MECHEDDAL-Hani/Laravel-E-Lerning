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
|
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
/* 
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
    });
}); 
*/

/* 
GET	        /photos	                index	        photos.index
GET	        /photos/create	        create	        photos.create
POST        /photos	                store	        photos.store
GET	        /photos/{photo}	        show	        photos.show
GET	        /photos/{photo}/edit	edit	        photos.edit
PUT/PATCH	/photos/{photo}	        update	        photos.update
DELETE	    /photos/{photo}	        destroy	        photos.destroy 
*/