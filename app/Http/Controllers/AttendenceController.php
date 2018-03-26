<?php

namespace App\Http\Controllers;

use App\PresentNow;
use Illuminate\Http\Request;
use App\Attendence;
use Auth;
use App\CourseSchedule;
use App\User;
use App\Students;
use App\Teachers;
use App\Courses;
use App\Days;
use App\Periods;
use App\Building;
use App\Sections;
use App\Classes;

class AttendenceController extends Controller
{

    public function dashboard()
    {
        $datacollection = Attendence::orderby('id', 'DESC')->paginate(5);

        $studPresentToday = count(array_unique(Attendence::where(['date'=>date('Y-m-d'),'role'=>1])->pluck('userid')->toArray()));

        $teacPresentToday = count(array_unique(Attendence::where(['date'=>date('Y-m-d'),'role'=>0])->pluck('userid')->toArray()));
       // $teacPresentToday = PresentNow::where(['role'=>2])->count();
        $studPresentNow = count(array_unique(Attendence::where(['date'=>date('Y-m-d'),'role'=>1])->pluck('userid')->toArray()));
        $teacPresentNow = count(array_unique(Attendence::where(['date'=>date('Y-m-d'),'role'=>1])->pluck('userid')->toArray()));

        $lastAttendance = Attendence::orderBy('id','desc')->limit(10)->get();

        return view('attendence.admin.dashboard',['datacollection'=>$datacollection,'studPresentToday'=>$studPresentToday,'teacPresentToday'=>$teacPresentToday,'studPresentNow'=>$studPresentNow,'teacPresentNow'=>$teacPresentNow,'lastAttendance'=>$lastAttendance]);;
    }

    public function index()
    {
        $datacollection = Attendence::orderby('id', 'DESC')
            //->where('command', '=', '1')   //i am only getting command 1 values
            //->orderby('id', 'ASC', 'command', 'ASC')

            ->paginate(5);

        ;
        return view('admins.attendence',['datacollection'=>$datacollection]);;
    }

    public function student()
    {
        $dataset = Attendence::where('userid',Auth::user()->id)->orderby('id', 'DESC')
            //->where('command', '=', '1')   //i am only getting command 1 values
            //->orderby('id', 'ASC', 'command', 'ASC')

            ->paginate(5);
        
        return view('students.attendence',['dataset'=>$dataset]);;
    }

    public function teacher()
    {
        $dataset = Attendence::where('userid',Auth::user()->id)->orderby('id', 'DESC')
            //->where('command', '=', '1')   //i am only getting command 1 values
            //->orderby('id', 'ASC', 'command', 'ASC')

            ->paginate(5);

        return view('attendence.teacher.index',['dataset'=>$dataset]);;
    }

    public function checkStudentAttendenceCourses(){
        $id=Auth::user()->id;
        $courseids=CourseSchedule::where('teachers_id',$id)->pluck('courses_id')->unique();
        $dataset=Courses::whereIn('id',$courseids)->orderBy('name')->paginate(20);
        $target="attendence";
        return view('teachers.courses',['dataset'=>$dataset,'target'=>$target]);
        //return view('teachers.test');
    }

    public function checkSingleStudentAttendence($id){
        $user=User::where('id',$id)->first();
        $datacollection = Attendence::where('userid',$id)->orderby('id', 'DESC')
            ->paginate(15);

        ;
        return view('attendence.teacher.viewstudentattendence',['dataset'=>$datacollection,'user'=>$user]);;
    }

    public function studentAttendance($userid){
        $attendance=Attendence::where('userid',$userid)->orderby('id', 'DESC')
            ->paginate(500);
        $student=Students::where('userid',$userid)->first();
        return view('attendence.admin.viewstudentattendance',['attendance'=>$attendance,'student'=>$student]);;
    }

    public function courseDashboard(){
        $datacollection = Classes::orderby('id', 'DESC')
            ->paginate(20);
        $present=Attendence::where('date',date('Y-m-d'))->pluck('userid')->unique()->count();
        return view('attendence.admin.coursedashboard',['datacollection'=>$datacollection]);

    }

    public function viewAttendanceSection($id){
        $section=Sections::where('id',$id)->first();
        //First get all students of a sections and their userid
        $studentUserIDs=$section->students()->pluck('userid');
        $presentStudentIDs=Attendence::where('date',date('Y-m-d'))->whereIn('userid',$studentUserIDs)->pluck('userid')->unique();
        //Now get all users with those associated student id
        $absentStudents=User::whereIn('id',$studentUserIDs)->whereNotIn('id',$presentStudentIDs)->orderBy('name')->paginate(1000);
        $presentStudents=User::whereIn('id',$presentStudentIDs)->orderBy('name')->paginate(1000);
        return view('attendence.admin.viewsection',['absentStudents'=>$absentStudents,'section'=>$section,'presentStudents'=>$presentStudents]);

    }



}
