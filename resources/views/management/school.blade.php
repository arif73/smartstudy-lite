@extends('admins.sidebar')

@section('title')
    Admin Panel
@endsection

@section('page-name')
    Admin Panel
@endsection

@section('section-name')

School Management

@endsection


@section('content')
    <div class="container" style="margin-left: 20px; margin-bottom: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h3 class="schoolhead">School </h3></div>
        </div>
        <div class="row">
            <div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="../admin/viewclasses">
                        <div class="img"><img src="assets/img/chem2.png" alt="img"></div>
                        <div class="info">
                            <h3>Class & Section</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('building.index')}}">
                        <div class="img"><img src="assets/img/math.png" alt="img"></div>
                        <div class="info">
                            <h3>Rooms</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('course.dashboard')}}">
                        <div class="img"><img src="assets/img/english.jpg" alt="img"></div>
                        <div class="info">
                            <h3>Courses</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="assets/img/science.jpg" alt="img"></div>
                        <div class="info">
                            <h3>Results</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="assets/img/mathe.png" alt="img"></div>
                        <div class="info">
                            <h3>News</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="assets/img/bengali.jpg" alt="img"></div>
                        <div class="info">
                            <h3>Events</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="assets/img/atom.png" alt="img"></div>
                        <div class="info">
                            <h3>Message</h3>

                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div>

                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('period.index')}}">
                        <div class="img"><img src="assets/img/bengali.jpg" alt="img"></div>
                        <div class="info">
                            <h3>Periods</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="assets/img/atom.png" alt="img"></div>
                        <div class="info">
                            <h3>Message</h3>

                        </div>
                    </a>
                </div>


                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="../admin/viewclasses">
                        <div class="img"><img src="assets/img/chem2.png" alt="img"></div>
                        <div class="info">
                            <h3>Class & Section</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="{{route('building.index')}}">
                        <div class="img"><img src="assets/img/math.png" alt="img"></div>
                        <div class="info">
                            <h3>Rooms</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="assets/img/english.jpg" alt="img"></div>
                        <div class="info">
                            <h3>Courses</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="assets/img/science.jpg" alt="img"></div>
                        <div class="info">
                            <h3>Results</h3>

                        </div>
                    </a>
                </div>
                <div style="float: left; margin-right: 10px;" class="items circle effect2 left_to_right left">
                    <a href="#">
                        <div class="img"><img src="assets/img/mathe.png" alt="img"></div>
                        <div class="info">
                            <h3>News</h3>

                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>


@endsection