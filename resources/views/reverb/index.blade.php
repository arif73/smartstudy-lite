<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>revebr-3</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dock.css">
    <link rel="stylesheet" href="assets/css/hover-box.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/user.css">
</head>

<body>
    <div id="dock-container" style="position: fixed; padding-top: 180px; bottom: 0%;  background: #ffffff;">
            <ul>
                <li>
                    <span>Mail</span>
                    <a href="#"><img src="assets/img/Mac-Address-Book-icon.png"/></a>
                </li>
                <li>
                    <span>Homework</span>
                    <a href="#"><img src="assets/img/home-work.png"/></a>
                </li>
                <li>
                    <span>Result</span>
                    <a href="#"><img src="assets/img/res-icon.png"/></a>
                </li>
                <li>
                    <span>Notice</span>
                    <a href="#"><img src="assets/img/notice.png"/></a>
                </li>
                <li>
                    <span>Events</span>
                    <a href="#"><img src="assets/img/eventus.png"/></a></li>
                <li>
                    <span>Attendance</span>
                    <a href="#"><img src="assets/img/att.png"/></a>
                </li>
                <li>
                    <span>News</span>
                    <a href="#"><img src="assets/img/news.png"/></a>
                </li>
                <li>
                    <span>Message</span>
                    <a href="#"><img src="assets/img/message.png"/></a>
                </li>
                <li>
                    <span>Profile</span>
                    <a href="#"><img src="assets/img/profile.png"/></a>
                </li>
                <li>
                    <span>Logout</span>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img src="assets/img/logout.png"/></a>
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
                </button><a class="navbar-brand navbar-link" href="#"><span class="glyphicon glyphicon-phone"></span>RE<strong>VERB</strong></a></div>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="#">Dashboard</a></li>
                    <li id="notification_li">
                        <span id="notification_count">5</span>
                        <a href="#" id="notificationLink">Notification</a>
                        <div id="notificationContainer">
                            <div id="notificationTitle">You have 5 Notifications</div>
                            <div id="notificationsBody" class="notifications">
                                <ul class="slide-animation" id="animated-list">
                                    <li>
                                        <a href="#">
                                            <img src="assets/img/perosna.jpg" class="persona" title="Persona" title="Persona" />
                                            <span class="list-text">You have 2 pending Physics homework</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="assets/img/perosna.jpg" class="persona" title="Persona" title="Persona" />
                                            <span class="list-text">Chemistry mid-term exam is on 2 June</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="assets/img/perosna.jpg" class="persona" title="Persona" title="Persona" />
                                            <span class="list-text">School will be closed on 10 July</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="assets/img/perosna.jpg" class="persona" title="Persona" title="Persona" />
                                            <span class="list-text">You can retake mid-term exam</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="assets/img/perosna.jpg" class="persona" title="Persona" title="Persona" />
                                            <span class="list-text">You got A+ on Bengali 1st Paper</span>
                                        </a>
                                    </li>

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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="schoolhead">Homework </h3></div>
        </div>
        <div class="row">
            <div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/chem2.png" alt="img"></div>
            <div class="info">
                <h3>Higher Mathematics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/math.png" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/english.jpg" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/science.jpg" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/mathe.png" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/bengali.jpg" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/atom.png" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/social.png" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/biology_logo.jpg" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="schoolhead">Result </h3></div>
        </div>
        <div class="row">
            <div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/english.jpg" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/atom.png" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/chem2.png" alt="img"></div>
            <div class="info">
                <h3>Higher Mathematics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/bengali.jpg" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/science.jpg" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/math.png" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/mathe.png" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/biology_logo.jpg" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
        <a href="#">
            <div class="img"><img src="assets/img/social.png" alt="img"></div>
            <div class="info">
                <h3>Physics</h3>
                
            </div>
        </a>
    </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
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

</html>