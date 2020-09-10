<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_id', 'course_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

}
