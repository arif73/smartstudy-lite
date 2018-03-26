<?php

namespace App\Http\Controllers\Api;

use App\CourseDates;
use App\HomeworkSubmissions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\News;
use App\Attendence;
use App\Events;
use App\Students;
use App\CourseSchedule;
use App\CourseClasses;
use App\Sections;
use App\Teachers;
use App\Courses;

use App\Homework;
use Auth;
use App\ParticipatingSchools;



class APIControllerAttendance extends Controller
{

    public function tGetCourseStudents(Request $request)
    {   //Check Authentication
        if(!$this->checkAuthentication($request)){
            $data['error'] = true;
            $data['error_code'] = 401;
            $data['msg'] = "Unauthorized Acccess!";
            return response()->json($data);
            }

        //Check Permission
        if(CourseSchedule::where(['teachers_id'=>Auth::user()->id,'courses_id'=>$request->courseID])->count()==0){
            $data['error'] = true;
            $data['error_code'] = 403;
            $data['msg'] = "Permission Denied";
            return response()->json($data);
        }

        try {
            $courseID = $request->courseID;
            if ($course=Courses::where('id', $courseID)->first()) {
                //Courses::where('id', 9909)->first()->courseStudentsWithAttendance();
                $students = $course->courseStudentsWithAttendance();

                // set result array
                $data['data'] = $students;
                $data['error'] = false;
                $data['msg'] = "success";
                return response()->json($data);

            } else {
                $data['error'] = true;
                $data['error_code'] = 404;
                $data['msg'] = "No courses found with this id";
                return response()->json($data);
            }
        }catch(\Error $e){
            $data['error'] = true;
            $data['error_code'] = 500;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
        catch(\Exception $e){
            $data['error'] = true;
            $data['error_code'] = 500;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
    }

    public function checkAuthentication(Request $request){
        if(Auth::attempt([
            'username'=> $request->username,
            'password'=> $request->password
        ])){
            return true;}
        else{
           return false;
        }


    }

    public function tCourseScheduleWithAttendance(Request $request)
    {   //Check Authentication
        if(!$this->checkAuthentication($request)){
            $data['error'] = true;
            $data['errorcode'] = 401;
            $data['msg'] = "Unauthorized Acccess!";
            return response()->json($data);
        }

        //Check Permission
        if(CourseSchedule::where(['teachers_id'=>Auth::user()->id,'courses_id'=>$request->courseID])->count()==0){
            $data['error'] = true;
            $data['error_code'] = 404;
            $data['msg'] = "Permission Denied";
            return response()->json($data);
        }

        try {
            $courseID = $request->courseID;
            if ($course=Courses::where('id', $courseID)->first()) {
                //Courses::where('id', 9909)->first()->courseStudentsWithAttendance();
                //$students = $course->courseStudentsWithAttendance();
                $schedule = new Collection();
                $courseDatesList=CourseDates::where('courses_id',$courseID)->orderBy('date','ASC')->get();
                foreach($courseDatesList as $courseDate){
                    $courseDate->toatPresentStudentNumber=$courseDate->countAttendance();
                    $courseDate->classDay=$courseDate->day->name;
                    $courseDate->classTime=$courseDate->period->name;
                    $schedule->push($courseDate);
                }

                $schedule = $schedule->map(function ($s) {
                    return collect($s->toArray())
                        ->only(['id','classDay','classTime','date','toatPresentStudentNumber'])
                        ->all();
                });

                // set result array
                $data['schedule'] = $schedule;
                $data['error'] = false;
                $data['msg'] = "success";
                return response()->json($data);

            } else {
                $data['error'] = true;
                $data['msg'] = "No courses found with this id";
                return response()->json($data);
            }
       }catch(\Error $e){
            $data['classes'] = null;
            $data['error'] = true;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
        catch(\Exception $e){
            $data['classes'] = null;
            $data['error'] = true;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
    }


    public function tCourseAttendanceByDate(Request $request)
    {   //Check Authentication
        if(!$this->checkAuthentication($request)){
            $data['error'] = true;
            $data['errorcode'] = 401;
            $data['msg'] = "Unauthorized Acccess!";
            return response()->json($data);
        }

        //Check Permission
        if(CourseSchedule::where(['teachers_id'=>Auth::user()->id,'courses_id'=>$request->courseID])->count()==0){
            $data['error'] = true;
            $data['msg'] = "Permission Denied";
            $data['errorcode'] = 403;
            return response()->json($data);
        }

        try {
        $courseID = $request->courseID;
        if ($course=Courses::where('id', $courseID)->first()) {
            $courseStudents=$course->courseAttendanceByDate($request->date);
            //Courses::where('id', 9909)->first()->courseStudentsWithAttendance();
            //$students = $course->courseStudentsWithAttendance();
            $schedule = new Collection();
            $courseDatesList=CourseDates::where('courses_id',$courseID)->orderBy('date','ASC')->get();
            foreach($courseDatesList as $courseDate){
                $courseDate->toatPresentStudentNumber=$courseDate->countAttendance();
                $courseDate->classDay=$courseDate->day->name;
                $courseDate->classTime=$courseDate->period->name;
                $schedule->push($courseDate);
            }

            $schedule = $schedule->map(function ($s) {
                return collect($s->toArray())
                    ->only(['id','classDay','classTime','date','toatPresentStudentNumber'])
                    ->all();
            });

            // set result array
            $data['data'] = $courseStudents;
            $data['error'] = false;
            $data['msg'] = "success";
            return response()->json($data);

        } else {
            $data['error'] = true;
            $data['msg'] = "No courses found with this id";
            return response()->json($data);
        }
        }catch(\Error $e){
            $data['error'] = true;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
        catch(\Exception $e){
            $data['error'] = true;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
    }

    public function bulkAttendanceEntry(Request $request)

    {
        if(!$this->checkAuthentication($request)){
            $data['error'] = true;
            $data['errorcode'] = 401;
            $data['msg'] = "Unauthorized Acccess!";
            return response()->json($data);
        }

        //Check Permission
        if(!Auth::user()->role=='teacher'|'admin'){
            $data['error'] = true;
            $data['msg'] = "Permission Denied";
            $data['errorcode'] = 403;
            return response()->json($data);
        }

        try {
            $staffid=Auth::user()->id;
            $staffrole=Auth::user()->role;
            $courseID=$request->courseID;
            $date=$request->presentDate;
            $machinetime=$request->presentTime;
            $count=0;
            foreach($request->attendance as $i=>$a){
                if($a['present']==1){
                    Attendence::create([
                        'date' => $date,
                        'machinetime' => $machinetime,
                        'userid' => $a['userid'],
                        'role' => 1,
                        'staffuserid' => $staffid,
                        'approved' => 1,
                        'delay' => $request->delay,
                        'type'=>1,
                        'present'=>1,
                    ]);
                    $count++;
                }
            }

            // set result array
            $data['totalPresent'] = $count;
            $data['error'] = false;
            $data['msg'] = "success";
            return response()->json($data);


        }catch(\Error $e){
            $data['error'] = true;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }
        catch(\Exception $e){
            $data['error'] = true;
            $data['msg'] = "Exceptions Caught: ".$e->getMessage()." in ".$e->getLine();
            return response()->json($data);
        }

    }

}
