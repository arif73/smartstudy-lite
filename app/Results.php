<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    protected $table='results';

    protected $fillable = [
     'courses_id','mark','name','type','passmark','teachers_id',
    ];

    public function courses()
    {
        return $this->hasOne('App\Courses','id','courses_id');
    }

    public function teacher()
    {
        return $this->hasOne('App\User','id','teachers_id');
    }

}
