<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    protected $table='courseschedule';

    protected $fillable = [
        'courses_id', 'teachers_id','buildings_id','rooms_id','periods_id','days_id',
    ];

    public function period()
    {
        return $this->hasOne('App\Periods','id','periods_id');
    }

    public function day()
    {
        return $this->hasOne('App\Days','id','days_id');
    }

    public function building()
    {
        return $this->hasOne('App\Building','id','buildings_id');
    }

    public function room()
    {
        return $this->hasOne('App\Room','id','rooms_id');
    }

    public function teacher()
    {
        return $this->hasOne('App\User','id','teachers_id');
    }

    public function course()
    {
        return $this->hasOne('App\Courses','id','courses_id');
    }
}
