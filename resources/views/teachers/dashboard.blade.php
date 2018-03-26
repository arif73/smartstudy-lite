@extends('template.macosdoc.master.teacher')

@section('title')
    SMART STUDY - Teacher Panel
@endsection

@section('page-name')

@endsection



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="schoolhead">Management </h3></div>
        </div>
        <div class="row" style="margin-bottom: 40px;">
            <div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('attendence.teacher.viewcourses')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/attendance.png" alt="img"></div>
                        <div class="info">
                            <h3>Student Attendence</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('attendence.teacher.viewcourses')}}'" align="center" type="button" class="btn btn-xs btn-block">Student Attendence</button></div>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('teacher.homework')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/homework.png" alt="img"></div>
                        <div class="info">
                            <h3>Manage Homework</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('teacher.homework')}}'" align="center" type="button" class="btn btn-xs btn-block">Manage Homework</button></div>
                </div>

                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('teacher.profile')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/edit-profile.png" alt="img"></div>
                        <div class="info">
                            <h3>Profile</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('teacher.profile')}}'" align="center" type="button" class="btn btn-xs btn-block">Update Profile</button></div>
                </div>
                
                 <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('teacher.payment')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/files.png" alt="img"></div>
                        <div class="info">
                            <h3>Payment</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('teacher.payment')}}'" align="center" type="button" class="btn btn-xs btn-block">Payment</button></div>
                </div>
                
                
                 <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('teacher.result')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/self-attendance.png" alt="img"></div>
                        <div class="info">
                            <h3>Result</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('teacher.result')}}'" align="center" type="button" class="btn btn-xs btn-block">Result</button></div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="schoolhead">School </h3>
            </div>
        </div>
        <div class="row">
            <div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('teacher.courses')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/courses.png" alt="img"></div>
                        <div class="info">
                            <h3>Courses</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('teacher.courses')}}'" align="center" type="button" class="btn btn-xs btn-block">Courses</button></div>
                </div>

                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('attendence.teacher')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/self-attendance.png" alt="img"></div>
                        <div class="info">
                            <h3>Self Attendence</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('attendence.teacher')}}'" align="center" type="button" class="btn btn-xs btn-block">Self Attendence</button></div>
                </div>

                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/meeting.png" alt="img"></div>
                        <div class="info">
                            <h3>Meeting (Available in Alpha)</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='#'" align="center" type="button" class="btn btn-xs btn-block">Meeting</button></div>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/teachers.png" alt="img"></div>
                        <div class="info">
                            <h3>Teachers (Available in Alpha)</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='#'" align="center" type="button" class="btn btn-xs btn-block">Teachers</button></div>
                </div>



                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/students.png" alt="img"></div>
                        <div class="info">
                            <h3>Students (Available in Alpha)</h3>

                        </div>
                    </a>

                    <div class="panelbtn"><button onclick="window.location.href='#'" align="center" type="button" class="btn btn-xs btn-block">Students</button></div>
                </div>

                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/files.png" alt="img"></div>
                        <div class="info">
                            <h3>E-Files (Available in Alpha)</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='#'" align="center" type="button" class="btn btn-xs btn-block">E-Files</button></div>
                </div>

            </div>
        </div>
    </div>



@endsection