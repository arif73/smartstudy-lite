<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseResults extends Model
{
    protected $table='courseresults';

    protected $fillable = [
        'results_id', 'courses_id','students_id','pass','mark','grade',
    ];


    public function courses()
    {
        return $this->hasMany('App\Courses','id','courses_id');
    }

    public function students()
    {
        return $this->hasMany('App\Students','id','students_id');
    }

    public function results()
    {
        return $this->hasMany('App\Results','id','results_id');
    }

}
