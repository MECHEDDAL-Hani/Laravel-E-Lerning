<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'resource_id';
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['published' , 'position'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public function resource()
    {
        return $this->hasOne('App\Model\resource', 'id', 'resource_id');
    }
}
