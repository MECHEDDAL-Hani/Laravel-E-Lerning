<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentExercise extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public function reponce()
    {
        return $this->hasOne('App\Model\reponce', 'id', 'reponce_id');
    }
}
