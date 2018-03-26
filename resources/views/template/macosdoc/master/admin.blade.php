<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--select2-->
    <link rel="stylesheet" href="{{getenv('baseurl')}}/assets/css/select2.css">

    <link rel="stylesheet" href="{{getenv('baseurl')}}/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{getenv('baseurl')}}/assets/css/dock.css">
    <link rel="stylesheet" href="{{getenv('baseurl')}}/assets/css/hover-box.css">
    <link rel="stylesheet" href="{{getenv('baseurl')}}/assets/css/nav.css">
    <link rel="stylesheet" href="{{getenv('baseurl')}}/assets/css/styles.css">
    <link rel="stylesheet" href="{{getenv('baseurl')}}/assets/css/user.css">
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{getenv('baseurl')}}/assets/css/themify-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{getenv('baseurl')}}/assets/css/stylenews.css" media="screen" />
    
    {{-- <link rel="stylesheet" href="https://demo.smart-school.in/backend/dist/css/ss-main.css">--}}



</head>

<body>
<div id="dock-container" style="position: fixed; padding-top: 20px; bottom: 0%;  background: #ffffff;">
    <ul>
        <li>
            <span>Dashboard</span>
            <a href="{{route('admin.dashboard')}}"><img src="{{getenv('baseurl')}}/assets/img/rooms.png"/></a></li>
        </li>
        <li>
            <span>Admins</span>
            <a href="{{route('admin.index')}}"><img src="{{getenv('baseurl')}}/assets/img/admins.png"/></a></li>
        </li>

        <li>
            <span>Teachers</span>
            <a href="{{route('teacher.index')}}"><img src="{{getenv('baseurl')}}/assets/img/teachers.png"/></a></li>
        </li>

        <li>
            <span>Students</span>
            <a href="{{route('student.index')}}"><img src="{{getenv('baseurl')}}/assets/img/students.png"/></a></li>
        </li>

        <li>
            <span>Courses</span>
            <a href="{{route('course.dashboard')}}"><img src="{{getenv('baseurl')}}/assets/img/courses.png"/></a></li>
        </li>
{{--
        <li>
            <span>Class Routine</span>
            <a href="{{route('course.dashboard')}}"><img src="{{getenv('baseurl')}}/assets/img/classes.png"/></a></li>
        </li>
--}}
          <li>
            <span>Attendance</span>
            <a href="{{ route('attendance.admin.dashboard') }}"><img src="{{getenv('baseurl')}}/assets/img/attendance.png"/></a>
        </li>
        <li>
            <span>Notice</span>
            <a href="{{ route('notice.admin.index') }}"><img src="{{getenv('baseurl')}}/assets/img/notice.png"/></a>
        </li>

        <li>
            <span>News</span>
            <a href="{{ route('news.admin.index') }}"><img src="{{getenv('baseurl')}}/assets/img/news.png"/></a>
        </li>

        <li>
            <span>Events</span>
            <a href="{{ route('events.admin.index') }}"><img src="{{getenv('baseurl')}}/assets/img/events.png"/></a>
        </li>
        <li>
            <span>Logout</span>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img src="{{getenv('baseurl')}}/assets/img/logout.png"/></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button><a class="navbar-brand navbar-link" href="{{route('admin.dashboard')}}"><span class="glyphicon glyphicon-phone"></span><strong>Admin</strong> PANEL @yield('page-name')</a></div>
        <div class="collapse navbar-collapse" id="navcol-2">
            <ul class="nav navbar-nav navbar-right">
                <li class="active" role="presentation"><a href="#">{{Auth::user()->name}}</a></li>
                <li id="notification_li">
                    <span id="notification_count">0</span>
                    <a href="#" id="notificationLink">Notification</a>
                    <div id="notificationContainer">
                        <div id="notificationTitle">You have no new Notifications</div>
                        <div id="notificationsBody" class="notifications">
                            <ul class="slide-animation" id="animated-list">


                            </ul>
                        </div>
                </li>
                <li role="presentation"><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 20px;margin-bottom:150px">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">@yield('section-name')</h4>
                </div>
                <div class="content">

                    <div class="row">

                        @yield('content')
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>




<script src="{{getenv('baseurl')}}/assets/js/jquery.min.js"></script>
<script src="{{getenv('baseurl')}}/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#notificationLink").click(function() {
            $("#notificationContainer").fadeToggle(300);
            $("#notification_count").fadeOut("slow");
            return false;
        });

        //Document Click hiding the popup
        $(document).click(function() {
            $("#notificationContainer").hide();
            $("#animated-list").removeClass("show");
        });

        //Popup on click
        $("#notificationContainer").click(function() {
            return false;
        });

        $("#notificationLink").click(function(){
            if($("#animated-list").hasClass("show")){
                $("#animated-list").removeClass("show");
            }
            else{
                $("#animated-list").addClass("show");
            }
        });

    });


    var element = document.documentElement;

    if(element.scrollHeight > element.clientHeight) {
        // Overflow detected; force scroll bar
        element.style.overflow = 'scrollbar';
    } else {
        // No overflow detected; prevent scroll bar
        element.style.overflow = 'hidden';
    }
</script>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</html>