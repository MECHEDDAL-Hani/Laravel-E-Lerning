<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'content'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public function course()
    {
        return $this->hasOne('App\Model\course', 'id', 'course_id');
    }
}
