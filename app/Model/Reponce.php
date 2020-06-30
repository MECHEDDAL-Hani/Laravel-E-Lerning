<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reponce extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['answare', 'status', 'notice'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];
}
