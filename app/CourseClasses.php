<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseClasses extends Model
{
    protected $table='courseclasses';

    protected $fillable = [
        'courses_id', 'classes_id','sections_id',
    ];

    public function sections()
    {
        return $this->belongsTo('App\Sections');
    }

    public function classes()
    {
        return $this->belongsTo('App\Classes');
    }

    public function courses()
    {
        return $this->hasMany('App\Courses','id','courses_id');
    }

}
