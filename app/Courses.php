<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Courses extends Model
{
    protected $table='courses';


    protected $fillable = [
        'name', 'codename','description','sessions_id','start','end','iconpath','class',
    ];

    protected $dates = ['start','end'];

    public function students()
    {
        return $this->belongsToMany('App\Students','coursestudents');
    }

    //testing new complicated relationship
    public function courseStudents()
    {
        $courseClasses=CourseClasses::where('courses_id',$this->id)->get();
        $students = new Collection();
        foreach ($courseClasses as $class){
            $classStudents=Students::where(['classes_id'=>$class->classes_id,'sections_id'=>$class->sections_id])->get();
            $students = $students->merge($classStudents);
        }
        return $students;
    }

    public function courseStudentsWithAttendance()
    {
        $classes = [];

        $courseClasses=CourseClasses::where('courses_id',$this->id)->get();
        $students = new Collection();
        foreach ($courseClasses as $class){
            $classStudents=Students::where(['classes_id'=>$class->classes_id,'sections_id'=>$class->sections_id])->get();

            foreach ($classStudents as $student) {
                $student->name=$student->userdata->name;
                $student->imagePath=$student->userdata->avatar;
                $student->lastPresentDate=$student->lastPresentDate();
                $student->totalPresent=$student->totalPresent();
            }
            $classStudents = $classStudents->map(function ($student) {
                return collect($student->toArray())
                    ->only(['userid','classroll','name','imagePath','lastPresentDate','totalPresent'])
                    ->all();
            });




            //$students = $students->merge($classStudents);

            $classes[] = [
                'name' => $class->classes->name." ".$class->sections->name,
                'students' =>  $classStudents
            ];
        }

        $otherStudentIDs=CourseStudents::where('courses_id',$this->id)->pluck('students_id');
        $otherStudents=Students::whereIn('userid',$otherStudentIDs)->get();

        foreach ($otherStudents as $student) {
            $student->name=$student->userdata->name;
            $student->imagePath=$student->userdata->avatar;
            $student->lastPresentDate=$student->lastPresentDate();
        }

        $otherStudents = $otherStudents->map(function ($student) {
            return collect($student->toArray())
                ->only(['userid','classroll','name','imagePath','lastPresentDate','totalPresent'])
                ->all();
        });

        $classes[] = [
            'name' => "Others",
            'students'=>$otherStudents
        ];
        return $classes;
    }

    public function courseAttendanceByDate($date)
    {
        $classes = [];

        $courseClasses=CourseClasses::where('courses_id',$this->id)->get();
        $students = new Collection();
        foreach ($courseClasses as $class){
            $classStudents=Students::where(['classes_id'=>$class->classes_id,'sections_id'=>$class->sections_id])->get();

            foreach ($classStudents as $student) {
                $student->name=$student->userdata->name;
                $student->imagePath=$student->userdata->avatar;
                if(Attendence::where(['userid'=>$student->userid,'mode'=>'enter','date'=>$date])->first())
                    $student->status=1;
                elseif(Attendence::where(['userid'=>$student->userid,'present'=>'1','date'=>$date])->first())
                    $student->status=1;
                else
                    $student->status=0;

            }
            $classStudents = $classStudents->map(function ($student) {
                return collect($student->toArray())
                    ->only(['userid','classroll','name','imagePath','status'])
                    ->all();
            });




            //$students = $students->merge($classStudents);

            $classes[] = [
                'name' => $class->classes->name." ".$class->sections->name,
                'students' =>  $classStudents
            ];
        }

        $otherStudentIDs=CourseStudents::where('courses_id',$this->id)->pluck('students_id');
        $otherStudents=Students::whereIn('userid',$otherStudentIDs)->get();

        foreach ($otherStudents as $student) {
            $student->name=$student->userdata->name;
            $student->imagePath=$student->userdata->avatar;
            if(Attendence::where(['userid'=>$student->userid,'mode'=>'enter','date'=>$date])->first())
                $student->status=1;
            elseif(Attendence::where(['userid'=>$student->userid,'present'=>'1','date'=>$date])->first())
                $student->status=1;
            else
                $student->status=0;
        }

        $otherStudents = $otherStudents->map(function ($student) {
            return collect($student->toArray())
                ->only(['userid','classroll','name','imagePath','status'])
                ->all();
        });

        $classes[] = [
            'name' => "Others",
            'students'=>$otherStudents
        ];
        return $classes;
    }

    public function sections()
    {
        return $this->belongsToMany('App\Sections','courseclasses');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\User','courseschedule','courses_id','teachers_id');
    }

    public function classes()
    {
        return $this->belongsToMany('App\Classes','courseclasses');
    }

    public function sessions()
    {
        return $this->hasOne('App\Sessions','id','sessions_id');
    }

    public function results()
    {
        return $this->hasMany('App\Results','courses_id','id');
    }
}
