<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $table='homeworks';

    protected $fillable = [
        'name', 'task', 'filepath', 'courses_id','teachers_id', 'deadline','coursename',
    ];
    
     public function teacher()
    {
        return $this->belongsTo('App\User','teachers_id','id');
    }
    
     public function course()
    {
        return $this->belongsTo('App\Courses','courses_id','id');
    }


}
