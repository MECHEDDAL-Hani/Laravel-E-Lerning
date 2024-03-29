<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentExam extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

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

    public function exam()
    {
        return $this->hasOne('App\Model\exam', 'practice_id', 'exam_id');
    }

}
