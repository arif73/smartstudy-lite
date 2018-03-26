<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    protected $table='students';

    protected $fillable = [
        'classes_id','sections_id','userid','classroll','ethnicity','address','bloodgroup','religion','gender',
    ];

    public function classes()
    {
        return $this->belongsTo('App\Classes');
    }

    public function section()
    {
        return $this->belongsTo('App\Sections','sections_id','id');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Courses','coursestudents');
    }

    public function userdata()
    {
        return $this->hasOne('App\User','id','userid');
    }

    public function payments()
    {
        return $this->hasMany('App\Payments','userid','userid');
    }

    public function results()
    {
        return $this->hasMany('App\CourseResults','students_id','userid');
    }

    public function lastPresentDate()
    {
        $lastPresent=Attendence::where('userid',$this->userid)->orderBy('date','DESC')->limit(1)->first();
        $lastPresentDate=null;
        if($lastPresent)
            $lastPresentDate=$lastPresent->date;
        elseif(!$lastPresent){}
        return $lastPresentDate;
    }

    public function totalPresent()
    {
        $totalPresent=Attendence::where('userid',$this->userid)->pluck('date')->unique()->count();
        return $totalPresent;
    }


}
