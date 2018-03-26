<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDates extends Model
{
    protected $table='coursedates';

    protected $fillable = [
        'courses_id', 'teachers_id','date','periods_id','days_id',
    ];

    public function countAttendance()
    {
        $courseStudentIDs=array_unique(Courses::where('id',$this->courses_id)->first()->courseStudents()->pluck('userid')->toArray());
        $countAttendance=count(array_unique(Attendence::whereIn('userid',$courseStudentIDs)->where('date',$this->date)->pluck('userid')->toArray()));
        return $countAttendance;
    }

    public function period()
    {
        return $this->hasOne('App\Periods','id','periods_id');
    }

    public function day()
    {
        return $this->hasOne('App\Days','id','days_id');
    }

}
