@extends('template.macosdoc.master.admin')

@section('title')
    SMART STUDY - Admin Panel
@endsection

@section('page-name')

@endsection



@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="schoolhead">School </h3></div>
        </div>
        <div class="row" style="margin-bottom: 40px;">
            <div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('admin.index')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/admins.png" alt="img"></div>
                        <div class="info">
                            <h3>Admins</h3>
                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('admin.index')}}'" align="center" type="button" class="btn btn-xs btn-block">Admins</button></div>

                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('teacher.index')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/teachers.png" alt="img"></div>
                        <div class="info">
                            <h3>Teachers</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('teacher.index')}}'" align="center" type="button" class="btn btn-xs btn-block">Teachers</button></div>

                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('student.index')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/students.png" alt="img"></div>
                        <div class="info">
                            <h3>Students</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('student.index')}}'" align="center" type="button" class="btn btn-xs btn-block">Students</button></div>

                </div>

                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('course.dashboard')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/courses.png" alt="img"></div>
                        <div class="info">
                            <h3>Courses</h3>

                        </div>
                    </a>

                    <div class="panelbtn"><button onclick="window.location.href='{{route('course.dashboard')}}'" align="center" type="button" class="btn btn-xs btn-block">Courses</button></div>

                </div>

                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('class.index')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/classes.png" alt="img"></div>
                        <div class="info">
                            <h3>Classes</h3>

                        </div>
                    </a>

                    <div class="panelbtn"><button onclick="window.location.href='{{route('class.index')}}'" align="center" type="button" class="btn btn-xs btn-block">Classes</button></div>

                </div>

                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('building.index')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/rooms.png" alt="img"></div>
                        <div class="info">
                            <h3>Rooms</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('building.index')}}'" align="center" type="button" class="btn btn-xs btn-block">Rooms</button></div>

                </div>

                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('period.index')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/periods.png" alt="img"></div>
                        <div class="info">
                            <h3>Periods</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('period.index')}}'" align="center" type="button" class="btn btn-xs btn-block">Periods</button></div>

                </div>



            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="schoolhead">Management </h3>
            </div>
        </div>
        <div class="row">
            <div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('attendance.admin.dashboard')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/attendance.png" alt="img"></div>
                        <div class="info">
                            <h3>Attendance</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('attendance.admin.dashboard')}}'" align="center" type="button" class="btn btn-xs btn-block">Attendance</button></div>

                </div>

             <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{ route('admin.courses') }}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/self-attendance.png" alt="img"></div>
                        <div class="info">
                            <h3>Result</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('admin.courses')}}'" align="center" type="button" class="btn btn-xs btn-block">Result</button></div>

                </div>
                
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('events.admin.index')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/events.png" alt="img"></div>
                        <div class="info">
                            <h3>Events</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('events.admin.index')}}'" align="center" type="button" class="btn btn-xs btn-block">Events</button></div>

                </div>




                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('notice.admin.index')}}">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/notice.png" alt="img"></div>
                        <div class="info">
                            <h3>Notice</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='{{route('notice.admin.index')}}'" align="center" type="button" class="btn btn-xs btn-block">Notice</button></div>

                </div>

                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/files.png" alt="img"></div>
                        <div class="info">
                            <h3>E-Files (available in alpha)</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='#'" align="center" type="button" class="btn btn-xs btn-block">E-Files</button></div>

                </div>


                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="{{getenv('baseurl')}}/assets/img/meeting.png" alt="img"></div>
                        <div class="info">
                            <h3>Meeting (available in alpha)</h3>

                        </div>
                    </a>
                    <div class="panelbtn"><button onclick="window.location.href='#'" align="center" type="button" class="btn btn-xs btn-block">Meeting</button></div>

                </div>

            </div>
        </div>
    </div>



@endsection