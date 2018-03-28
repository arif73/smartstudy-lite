<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));;
});

Route::get('/addstudent', function () {
    return view('students.add');
});

Route::get('/addteacher', function () {
    return view('teachers.add');
});

Route::get('/addadmin', function () {
    return view('admins.add');
});

Route::post('/login/custom', [
    'uses'=> 'LoginController@login',
    'as' => 'login.custom'
]);



Auth::routes();


    Route::post('/postaddstudent', [
        'uses'=> 'StudentController@postAdd',
        'middleware'=>'check-permission:admin',
        'as' => 'post.add.student'
    ]);

Route::post('/postaddteacher', [
    'uses'=> 'TeacherAddController@register',
    'as' => 'postaddteacher'
]);



Route::get('/login', [
    'uses'=> 'AdminController@login',
    'as' => 'login'
]);

Route::post('api/checkactivationcode','Api\Auth\APIController@getSchoolInfo');
Route::post('api/news','Api\Auth\APIController@news');
Route::post('api/attendence','Api\Auth\APIController@attendence');
Route::post('api/login','Api\Auth\APIController@login');
Route::post('api/events','Api\Auth\APIController@events');
Route::post('api/classroutine','Api\Auth\APIController@classRoutine');
Route::post('api/homework','Api\Auth\APIController@homework');
Route::post('api/teacher/courselist','Api\Auth\APIController@teacherCourseList');
Route::post('api/teacher/courseHomeworkList','Api\Auth\APIController@courseHomeworkList');
Route::post('api/teacher/submittedhomeworklist','Api\Auth\APIController@submittedHomeworkList');
Route::post('api/teacher/courseStudentsAttendance','Api\APIControllerAttendance@tGetCourseStudents');
Route::post('api/teacher/courseScheduleWithAttendance','Api\APIControllerAttendance@tCourseScheduleWithAttendance');
Route::post('api/teacher/courseAttendanceByDate','Api\APIControllerAttendance@tcourseAttendanceByDate');
Route::post('api/teacher/classRoutine','Api\APIControllerClassRoutine@tClassRoutine');
Route::post('api/teacher/result/getCourseResultsList','Api\APIControllerResult@tGetCourseResultsList');
Route::post('api/teacher/attendance/bulkAttendaneEntry','Api\APIControllerAttendance@bulkAttendanceEntry');

/*
|--------------------------------------------------------------------------
| Auth MiddleWare
-----------------------------------------------
|--------------------------------------------------------------------------

*/

Route::group(['middleware'=>'auth'],function (){

    /*
|--------------------------------------------------------------------------
| Students
|--------------------------------------------------------------------------

*/


    Route::get('student/dashboard',
        ['middleware'=>'check-permission:student','as'=>'student.dashboard','uses'=>'StudentController@dashboard']);




    Route::get('admin/students',
        ['middleware'=>'check-permission:admin','as'=>'student.index','uses'=>'StudentController@index']);

    Route::get('admin/student-add',
        ['middleware'=>'check-permission:admin','as'=>'student.add','uses'=>'StudentController@add']);

    Route::get('admin/student-edit-{id}',
        ['middleware'=>'check-permission:admin','as'=>'student.edit','uses'=>'StudentController@edit']);

    Route::get('admin/student/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'student.delete','uses'=>'StudentController@delete']);

    Route::get('student/attendence',
        ['middleware'=>'check-permission:student','as'=>'attendence.student','uses'=>'AttendenceController@student']);


    Route::get('student/profile',
        ['middleware'=>'check-permission:admin|student|teacher', 'as'=>'student.profile','uses'=>'StudentController@profile']);

    Route::get('student/routine',
        ['middleware'=>'check-permission:student', 'as'=>'student.routine','uses'=>'StudentController@routine']);


    Route::post('student/profile',
        ['middleware'=>'check-permission:admin|teacher', 'as'=>'student.profile','uses'=>'StudentController@update_avatar']);

      Route::post('/postaddstudent', [
        'uses'=> 'StudentController@postAdd',
        'middleware'=>'check-permission:admin',
        'as' => 'post.add.student'
    ]);

    Route::post('/posteditstudent', [
        'uses'=> 'StudentController@postUpdate',
        'middleware'=>'check-permission:admin',
        'as' => 'post.Edit.Student'
    ]);

    Route::get('admin/student-{id}',
        ['middleware'=>'check-permission:admin|teacher','as'=>'student.view','uses'=>'StudentController@view']);

    /*
|--------------------------------------------------------------------------
| Teachers
|--------------------------------------------------------------------------

*/
    Route::get('teacher/dashboard',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.dashboard','uses'=>'TeacherRouteController@dashboard']);

    Route::get('admin/teachers',
        ['middleware'=>'check-permission:admin','as'=>'teacher.index','uses'=>'TeacherController@index']);

    Route::get('admin/teacher-{id}',
        ['middleware'=>'check-permission:admin|teacher','as'=>'teacher.view','uses'=>'TeacherController@view']);

    Route::get('teacher/profile',
        ['middleware'=>'check-permission:teacher', 'as'=>'teacher.profile','uses'=>'TeacherController@profile']);

    Route::get('admin/teacher/add',
        ['middleware'=>'check-permission:admin','as'=>'teacher.add','uses'=>'TeacherController@add']);

    Route::post('/postaddteacher',
        ['middleware'=>'check-permission:admin', 'as' => 'post.add.teacher', 'uses'=> 'TeacherAddController@postAddTeacher']);

    Route::post('/posteditteacher',
        ['middleware'=>'check-permission:admin', 'as' => 'post.edit.teacher','uses'=> 'TeacherAddController@postEditTeacher']);

    Route::get('admin/teacher/edit/{id}',
        ['middleware'=>'check-permission:admin','as'=>'teacher.edit','uses'=>'TeacherController@edit']);

    Route::get('admin/teacher/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'teacher.delete','uses'=>'TeacherController@delete']);


    Route::get('teacher/homework',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.homework','uses'=>'TeacherController@homework']);



    Route::get('teacher/attendence',
        ['middleware'=>'check-permission:teacher','as'=>'attendence.teacher','uses'=>'AttendenceController@teacher']);

    Route::get('teacher/courses',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.courses','uses'=>'TeacherController@courses']);

    Route::get('teacher/Student-Attendence',
        ['middleware'=>'check-permission:teacher','as'=>'attendence.teacher.viewcourses','uses'=>'AttendenceController@checkStudentAttendenceCourses']);

    Route::get('teacher/Student-Attendence/{id}',
        ['middleware'=>'check-permission:teacher','as'=>'attendence.teacher.viewattendence','uses'=>'AttendenceController@checkSingleStudentAttendence']);

    /*
|--------------------------------------------------------------------------
| Admins
|--------------------------------------------------------------------------

*/

    Route::get('admin/dashboard',
        ['middleware'=>'check-permission:admin','as'=>'admin.dashboard','uses'=>'AdminController@dashboard']);

    Route::get('admin/admins',
        ['middleware'=>'check-permission:admin','as'=>'admin.index','uses'=>'AdminController@index']);

    Route::get('admin/add',
        ['middleware'=>'check-permission:admin','uses'=>'AdminController@add']);

    Route::get('admin/edit-{id}',
        ['middleware'=>'check-permission:admin','as'=>'admin.edit','uses'=>'AdminController@edit']);

    Route::get('admin/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'admin.delete','uses'=>'AdminController@delete']);



    Route::get('admin/profile',
        ['middleware'=>'check-permission:admin', 'as'=>'adminprofile','uses'=>'AdminController@profile']);

    Route::post('admin/profile',
        ['middleware'=>'check-permission:admin', 'as'=>'adminprofile','uses'=>'AdminController@update_avatar']);

     Route::post('/postaddadmin', [
        'uses'=> 'AdminController@postAddAdmin',
        'middleware'=>'check-permission:admin',
        'as' => 'postaddadmin'
    ]);

    Route::post('/posteditadmin', [
        'uses'=> 'AdminController@postUpdateAdmin',
        'middleware'=>'check-permission:admin',
        'as' => 'postEditAdmin'
    ]);

    Route::get('admin/view-{id}',
        ['middleware'=>'check-permission:admin','as'=>'admin.view','uses'=>'AdminController@view']);

    Route::get('admin/attendence',
        ['middleware'=>'check-permission:admin','as'=>'attendence.index','uses'=>'AttendenceController@index']);


    /*
|--------------------------------------------------------------------------
| School Management
|--------------------------------------------------------------------------

*/

    Route::get('admin/schoolmanagement',
        ['middleware'=>'check-permission:admin','as'=>'school.management', 'uses'=>'SchoolController@dashboard']);

    //Class //

    Route::get('admin/viewclasses',
        ['middleware'=>'check-permission:admin','as'=>'class.index', 'uses'=>'SchoolController@viewclasses']);

    Route::get('admin/addclasses',
        ['middleware'=>'check-permission:admin','as'=>'class.add', 'uses'=>'SchoolController@addclasses']);

    Route::post('/postaddclass', [
        'middleware'=>'check-permission:admin', 'as' => 'post.add.class','uses'=> 'SchoolController@processFormRequestAddClassess']);


    Route::get('admin/editclass-{id}',
        ['middleware'=>'check-permission:admin','as'=>'class.edit', 'uses'=>'SchoolController@editclasses']);

    Route::get('admin/viewclass-id-{id}',
        ['middleware'=>'check-permission:admin','as'=>'class.view', 'uses'=>'SchoolController@viewclass']);

    Route::post('/posteditclass', [
        'middleware'=>'check-permission:admin', 'as' => 'post.edit.class','uses'=> 'SchoolController@processFormRequestEditClassess']);


    Route::get('/ajaxGetSections-{class_id}', //access from edit student
        ['middleware'=>'check-permission:admin','as'=>'class.sections', 'uses'=>'SchoolController@ajaxGetSections']);

    Route::get('admin/classes/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'class.delete','uses'=>'SchoolController@delete']);

    //Sections

    Route::get('admin/viewsections',
        ['middleware'=>'check-permission:admin','as'=>'section.index', 'uses'=>'SectionController@viewsections']);

    Route::get('admin/class-addsection-id-{id}',
        ['middleware'=>'check-permission:admin','as'=>'section.add', 'uses'=>'SectionController@addsection']);

    Route::post('/postaddsection', [
        'middleware'=>'check-permission:admin', 'as' => 'post.add.section','uses'=> 'SectionController@processFormRequestAddSection']);


    Route::get('admin/editsection-{id}',
        ['middleware'=>'check-permission:admin','as'=>'section.edit', 'uses'=>'SectionController@editsection']);

    Route::get('admin/viewsection-{id}',
        ['middleware'=>'check-permission:admin','as'=>'section.view', 'uses'=>'SectionController@viewsection']);

    Route::post('/posteditsection', [
        'middleware'=>'check-permission:admin', 'as' => 'post.edit.section','uses'=> 'SectionController@processFormRequestEditSection']);


    Route::get('admin/sections/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'section.delete','uses'=>'SectionController@delete']);


    /*
|--------------------------------------------------------------------------
| Results
|--------------------------------------------------------------------------

*/
     Route::get('admin/results',
        ['middleware'=>'check-permission:admin','as'=>'result.dashboard', 'uses'=>'ResultController@dashboard']);
    Route::get('student/results',
        ['middleware'=>'check-permission:student','as'=>'result.student', 'uses'=>'ResultController@studentDashboard']);
    Route::get('teacher/result/course-{id}',
        ['middleware'=>'check-permission:teacher|admin','as'=>'teacher.result.course','uses'=>'ResultController@viewCourseResult']);

   Route::post('/postresultupdate', [
        'middleware'=>'check-permission:teacher', 'as' => 'post.result.update','uses'=> 'ResultController@postResultUpdate']);

    Route::get('teacher/result/remove/{id}',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.result.remove','uses'=>'ResultController@removeResult']);


    Route::get('teacher/result',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.result','uses'=>'TeacherController@result']);


    Route::get('teacher/result/add/course-{id}',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.result.add','uses'=>'TeacherController@addResult']);

    Route::get('teacher/result/view/course-{id}',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.result.view','uses'=>'TeacherController@viewcourseresult']);

    Route::post('/postresultname', [
        'middleware'=>'check-permission:teacher', 'as' => 'post.result.name','uses'=> 'TeacherController@postResultsName']);

    Route::get('teacher/result/update/course-{id}',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.course.result.update','uses'=>'TeacherController@updateResult']);

    Route::get('teacher/result/update/result/{id}',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.result.update','uses'=>'ResultController@updateResult']);




    /*
|--------------------------------------------------------------------------
| Payments
|--------------------------------------------------------------------------

*/


    Route::get('teacher/payment',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.payment','uses'=>'TeacherController@paymentDashboard']);

    Route::get('teacher/payment-courses-{id}',
        ['middleware'=>'check-permission:teacher','as'=>'course.payment.teacher','uses'=>'TeacherController@viewcoursePayment']);

    Route::get('teacher/payment/course/{courseid}/student/{studentid}',
        ['middleware'=>'check-permission:teacher','as'=>'course.payment.student','uses'=>'TeacherController@viewcourseStudentPayment']);

    Route::get('teacher/payment/course/{courseid}/student/{studentid}/add',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.student.payment.add','uses'=>'TeacherController@addStudentPayment']);


    Route::get('teacher/payment/update/{id}',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.student.payment.update','uses'=>'TeacherController@updateStudentPayment']);
    Route::post('/posteditpayment', [
        'middleware'=>'check-permission:teacher', 'as' => 'post.edit.teacher.student.payment','uses'=> 'TeacherController@postUpdateStudentPayment']);
    Route::post('/postaddpayment', [
        'middleware'=>'check-permission:teacher', 'as' => 'post.add.teacher.student.payment','uses'=> 'TeacherController@postAddStudentPayment']);
    Route::get('teacher/payment/remove/{id}',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.student.payment.remove','uses'=>'TeacherController@removePayment']);







    /*


|--------------------------------------------------------------------------
| Attendence
|--------------------------------------------------------------------------

*/
    Route::get('admin/attendance/dashboard',
        ['middleware'=>'check-permission:admin','as'=>'attendance.admin.dashboard', 'uses'=>'AttendenceController@dashboard']);

    Route::get('admin/attendance/selectcourse',
        ['middleware'=>'check-permission:admin','as'=>'attendance.admin.course.dashboard', 'uses'=>'AttendenceController@courseDashboard']);

    Route::get('admin/attendance/view/section/{id}',
        ['middleware'=>'check-permission:admin','as'=>'attendance.admin.view.section', 'uses'=>'AttendenceController@viewAttendanceSection']);

 Route::get('student/profile/{id}',
        ['middleware'=>'check-permission:admin|student', 'as'=>'student.globalprofile','uses'=>'StudentController@globalProfile']);

 Route::get('student/attendance/{studentid}',
        ['middleware'=>'check-permission:admin','as'=>'teacher.student.attendence.view','uses'=>'AttendenceController@studentAttendance']);


    /*


    /*
|--------------------------------------------------------------------------
| Courses
|--------------------------------------------------------------------------

*/
    Route::get('admin/courses',
        ['middleware'=>'check-permission:admin','as'=>'course.dashboard', 'uses'=>'CourseController@dashboard']);

    Route::get('admin/viewcourses-section-{id}',
        ['middleware'=>'check-permission:admin','as'=>'course.section', 'uses'=>'CourseController@sectioncourses']);
    Route::get('admin/viewcourses-class-{id}',
        ['middleware'=>'check-permission:admin','as'=>'course.class', 'uses'=>'CourseController@classcourses']);
    Route::get('admin/addcourse-{type}-{id}',
        ['middleware'=>'check-permission:admin','as'=>'course.add', 'uses'=>'CourseController@addcourse']);
    Route::get('admin/course/edit/{id}',
        ['middleware'=>'check-permission:admin','as'=>'course.edit', 'uses'=>'CourseController@editCourse']);
    Route::post('/posteditcourse', [
        'middleware'=>'check-permission:admin', 'as' => 'post.edit.course','uses'=> 'CourseController@postEdit']);
    Route::get('admin/assign-course',
        ['middleware'=>'check-permission:admin','as'=>'course.assign', 'uses'=>'CourseController@courseassign']);
    Route::post('/postaddcourse', [
        'middleware'=>'check-permission:admin', 'as' => 'post.add.course','uses'=> 'CourseController@processFormRequestAdd']);
    Route::post('/postaddcourseperiod', [
        'middleware'=>'check-permission:admin', 'as' => 'post.add.courseperiod','uses'=> 'CourseController@processFormRequestAddPeriod']);

    Route::get('admin/viewcourses-{id}',
        ['middleware'=>'check-permission:admin','as'=>'course.view', 'uses'=>'CourseController@viewcourse']);

    Route::get('teacher/courses',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.courses','uses'=>'TeacherController@courses']);
        
    Route::get('admin/allcourselist',
        ['middleware'=>'check-permission:admin','as'=>'admin.courses','uses'=>'AdminController@courses']);


    Route::get('teacher/viewcourses-{id}',
        ['middleware'=>'check-permission:teacher','as'=>'course.view.teacher','uses'=>'TeacherController@viewcourse']);

    Route::get('teacher/course-{id}/students',
        ['middleware'=>'check-permission:teacher','as'=>'course.students','uses'=>'CourseController@courseStudentsTeacher']);

    /*
|--------------------------------------------------------------------------
| Building and Rooms
|--------------------------------------------------------------------------

*/
    //Buildings

    Route::get('admin/buildings',
        ['middleware'=>'check-permission:admin','as'=>'building.index', 'uses'=>'BuildingController@index']);


    Route::get('admin/viewbuilding-{id}',
        ['middleware'=>'check-permission:admin','as'=>'building.view', 'uses'=>'BuildingController@viewbuilding']);

    Route::get('admin/addbuilding',
        ['middleware'=>'check-permission:admin','as'=>'building.add', 'uses'=>'BuildingController@addbuildings']);

    Route::post('/postaddbuilding', [
        'middleware'=>'check-permission:admin', 'as' => 'post.add.building','uses'=> 'BuildingController@processFormRequestAddBuildings']);

    Route::get('admin/editbuilding-{id}',
        ['middleware'=>'check-permission:admin','as'=>'building.edit', 'uses'=>'BuildingController@editbuilding']);

    Route::post('/posteditbuilding', [
        'middleware'=>'check-permission:admin', 'as' => 'post.edit.building','uses'=> 'BuildingController@processFormRequestEditBuildings']);

    Route::get('admin/buildings/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'building.delete','uses'=>'BuildingController@delete']);

    Route::get('/ajaxGetRooms-{buildings_id}', //access from view course
        ['middleware'=>'check-permission:admin','as'=>'building.rooms', 'uses'=>'BuildingController@ajaxGetRooms']);



    //Rooms

    Route::get('admin/addroom-bulding-id-{id}',
        ['middleware'=>'check-permission:admin','as'=>'room.add', 'uses'=>'RoomController@addroom']);

    Route::post('/postaddroom', [
        'middleware'=>'check-permission:admin', 'as' => 'post.add.room','uses'=> 'RoomController@processFormRequestAddRoom']);


    Route::get('admin/editroom-{id}',
        ['middleware'=>'check-permission:admin','as'=>'room.edit', 'uses'=>'RoomController@editroom']);

    Route::post('/posteditroom', [
        'middleware'=>'check-permission:admin', 'as' => 'post.edit.room','uses'=> 'RoomController@processFormRequestEditRoom']);


    Route::get('admin/viewroom-{id}',
        ['middleware'=>'check-permission:admin','as'=>'room.view', 'uses'=>'RoomController@viewroom']);


    Route::get('admin/rooms/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'room.delete','uses'=>'RoomController@delete']);


    /*
|--------------------------------------------------------------------------
| Periods
|--------------------------------------------------------------------------

*/
    Route::get('admin/periods',
        ['middleware'=>'check-permission:admin','as'=>'period.index', 'uses'=>'PeriodController@index']);


    Route::get('admin/viewperiod-{id}',
        ['middleware'=>'check-permission:admin','as'=>'period.view', 'uses'=>'PeriodController@view']);

    Route::get('admin/addperiod',
        ['middleware'=>'check-permission:admin','as'=>'period.add', 'uses'=>'PeriodController@add']);

    Route::post('/postaddperiod', [
        'middleware'=>'check-permission:admin', 'as' => 'post.add.period','uses'=> 'PeriodController@processFormRequestAdd']);

    Route::get('admin/editperiod-{id}',
        ['middleware'=>'check-permission:admin','as'=>'period.edit', 'uses'=>'PeriodController@edit']);

    Route::post('/posteditperiod', [
        'middleware'=>'check-permission:admin', 'as' => 'post.edit.period','uses'=> 'PeriodController@processFormRequestEdit']);

    Route::get('admin/periods/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'period.delete','uses'=>'PeriodController@delete']);



    /*
|--------------------------------------------------------------------------
| Others
|--------------------------------------------------------------------------

*/

    Route::get('permissions-all-users',['middleware'=>'check-permission:teacher|admin|student','uses'=>'PermissionController@allUsers']);
    Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'PermissionController@adminSuperadmin']);
    Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'PermissionController@superadmin']);
    Route::get('/PageNotFound',['uses'=>'ErrorController@RouteNotFound']);

    Route::get('/test1000',['uses'=>'StudentController@test1000']);
    Route::get('/macosdoc',function (){
        return view('test.macosdoc');
    });

    Route::get('/mac',function (){
        return view('test.mac1');
    });

    Route::get('assets/img/{$iconpath}', ['as'=>'course.icon']);


/*
|--------------------------------------------------------------------------
| Homework
|--------------------------------------------------------------------------
*/
    Route::get('teacher/homework/course/{courseid}',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.homework.course.index','uses'=>'HomeworkController@allHomeworkOfACourseTeacher']);

    Route::get('teacher/homework/submissions/{id}',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.homework.submissions.index','uses'=>'HomeworkController@allSubmissionOfAHomework']);

    Route::get('teacher/homework/evaluate/{id}',
        ['middleware'=>'check-permission:teacher','as'=>'teacher.homework.evaluate','uses'=>'HomeworkController@evaluateAHomework']);

    Route::get('teacher/addhomework/{courseid}',
        ['middleware'=>'check-permission:teacher','as'=>'homework.add', 'uses'=>'HomeworkController@addhomework']);

    Route::post('teacher/postaddhomework', [
        'middleware'=>'check-permission:teacher', 'as' => 'post.add.homework','uses'=> 'HomeworkController@postAddHomework']);

    Route::post('teacher/postedithomework', [
        'middleware'=>'check-permission:teacher', 'as' => 'post.edit.homework','uses'=> 'HomeworkController@postEditHomework']);

    Route::get('teacher/homework/edithomework-{id}',
        ['middleware'=>'check-permission:teacher','as'=>'homework.teacher.edit', 'uses'=>'HomeworkController@editHomework']);

    Route::post('/postevaluatehomework', [
        'middleware'=>'check-permission:teacher', 'as' => 'post.evaluate.homework','uses'=> 'HomeworkController@postEvaluateHomework']);

    Route::get('student/homework/course/{courseid}',
        ['middleware'=>'check-permission:student','as'=>'student.homework.course.index','uses'=>'HomeworkController@allHomeworkOfACourseStudent']);

    Route::get('student/homework/view/{id}',
        ['middleware'=>'check-permission:student','as'=>'student.homework.view','uses'=>'HomeworkController@viewAHomework']);

    Route::get('teacher/download/{path}',
        ['middleware'=>'check-permission:student','as'=>'download.correction.file','uses'=>'HomeworkController@downloadCorrectionFile']);


    /*
    |--------------------------------------------------------------------------
    | News
    |--------------------------------------------------------------------------
    */

    Route::get('admin/news',
        ['middleware'=>'check-permission:admin','as'=>'news.admin.index','uses'=>'NewsController@indexAdmin']);

    Route::get('admin/news/add',
        ['middleware'=>'check-permission:admin','as'=>'news.admin.add','uses'=>'NewsController@add']);

    Route::post('admin/postaddnews', [
        'middleware'=>'check-permission:admin', 'as' => 'post.add.news','uses'=> 'NewsController@postAdd']);

    Route::get('admin/news/edit/{id}',
        ['middleware'=>'check-permission:admin','as'=>'news.admin.edit','uses'=>'NewsController@edit']);

    Route::post('admin/posteditnews', [
        'middleware'=>'check-permission:admin', 'as' => 'post.edit.news','uses'=> 'NewsController@postEdit']);

    Route::get('admin/news/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'news.admin.delete','uses'=>'NewsController@delete']);

    Route::get('admin/news/view/{id}',
        ['middleware'=>'check-permission:admin','as'=>'news.admin.view','uses'=>'NewsController@viewAdmin']);

    Route::get('teacher/news',
        ['middleware'=>'check-permission:teacher','as'=>'news.teacher.index','uses'=>'NewsController@indexTeacher']);

    Route::get('teacher/news/view/{id}',
        ['middleware'=>'check-permission:teacher','as'=>'news.teacher.view','uses'=>'NewsController@viewTeacher']);

    Route::get('student/news',
        ['middleware'=>'check-permission:student','as'=>'news.student.index','uses'=>'NewsController@indexStudent']);

    Route::get('student/news/view/{id}',
        ['middleware'=>'check-permission:student','as'=>'news.student.view','uses'=>'NewsController@viewStudent']);

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */

    Route::get('admin/events',
        ['middleware'=>'check-permission:admin','as'=>'events.admin.index','uses'=>'EventsController@indexAdmin']);

    Route::get('admin/events/add',
        ['middleware'=>'check-permission:admin','as'=>'events.admin.add','uses'=>'EventsController@add']);

    Route::post('admin/postaddevents', [
        'middleware'=>'check-permission:admin', 'as' => 'post.add.events','uses'=> 'EventsController@postAdd']);

    Route::get('admin/events/edit/{id}',
        ['middleware'=>'check-permission:admin','as'=>'events.admin.edit','uses'=>'EventsController@edit']);

    Route::post('admin/posteditevents', [
        'middleware'=>'check-permission:admin', 'as' => 'post.edit.events','uses'=> 'EventsController@postEdit']);

    Route::get('admin/events/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'events.admin.delete','uses'=>'EventsController@delete']);

    Route::get('admin/events/view/{id}',
        ['middleware'=>'check-permission:admin','as'=>'events.admin.view','uses'=>'EventsController@viewAdmin']);

    Route::get('teacher/events',
        ['middleware'=>'check-permission:teacher','as'=>'events.teacher.index','uses'=>'EventsController@indexTeacher']);

    Route::get('teacher/events/view/{id}',
        ['middleware'=>'check-permission:teacher','as'=>'events.teacher.view','uses'=>'EventsController@viewTeacher']);

    Route::get('student/events',
        ['middleware'=>'check-permission:student','as'=>'events.student.index','uses'=>'EventsController@indexStudent']);

    Route::get('student/events/view/{id}',
        ['middleware'=>'check-permission:student','as'=>'events.student.view','uses'=>'EventsController@viewStudent']);


    /*
    |--------------------------------------------------------------------------
    | Notices
    |--------------------------------------------------------------------------
    */

    Route::get('admin/notice',
        ['middleware'=>'check-permission:admin','as'=>'notice.admin.index','uses'=>'NoticeController@indexAdmin']);

    Route::get('admin/notice/add',
        ['middleware'=>'check-permission:admin','as'=>'notice.admin.add','uses'=>'NoticeController@add']);

    Route::post('admin/postaddnotice', [
        'middleware'=>'check-permission:admin', 'as' => 'post.add.notice','uses'=> 'NoticeController@postAdd']);

    Route::get('admin/notice/edit/{id}',
        ['middleware'=>'check-permission:admin','as'=>'notice.admin.edit','uses'=>'NoticeController@edit']);

    Route::post('admin/posteditnotice', [
        'middleware'=>'check-permission:admin', 'as' => 'post.edit.notice','uses'=> 'NoticeController@postEdit']);

    Route::get('admin/notice/delete/{id}',
        ['middleware'=>'check-permission:admin','as'=>'notice.admin.delete','uses'=>'NoticeController@delete']);

    Route::get('admin/notice/view/{id}',
        ['middleware'=>'check-permission:admin','as'=>'notice.admin.view','uses'=>'NoticeController@viewAdmin']);

    Route::get('teacher/notice',
        ['middleware'=>'check-permission:teacher','as'=>'notice.teacher.index','uses'=>'NoticeController@indexTeacher']);

    Route::get('teacher/notice/view/{id}',
        ['middleware'=>'check-permission:teacher','as'=>'notice.teacher.view','uses'=>'NoticeController@viewTeacher']);

    Route::get('student/notice',
        ['middleware'=>'check-permission:student','as'=>'notice.student.index','uses'=>'NoticeController@indexStudent']);

    Route::get('student/notice/view/{id}',
        ['middleware'=>'check-permission:student','as'=>'notice.student.view','uses'=>'NoticeController@viewStudent']);



    Route::get('student/notice/view/{id}',
        ['middleware'=>'check-permission:student','as'=>'notice.student.view','uses'=>'NoticeController@viewStudent']);

    /*
    |--------------------------------------------------------------------------
    | Others
    |--------------------------------------------------------------------------
    */
    Route::get('teacher/homeworksubmissions/download/{filename}',
        ['middleware'=>'check-permission:teacher','as'=>'download.teacher.homeworksubmission','uses'=>'HomeworkController@downloadHomeworkSubmissionTeacher']);

});

