<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStudents extends Model
{
    protected $table='coursestudents';

    protected $fillable = [
        'courses_id', 'students_id',
    ];
}
