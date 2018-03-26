@extends('template.macosdoc.master.admin')

@section('title')
    Attendance Dashboard
@endsection

@section('page-name')
    :: Attendence Dashboard
@endsection




@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h4 class="title">Present Today</h4>
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-user-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Teachers</span>
                                <span class="info-box-number">{{$teacPresentToday}}</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h4>. </h4>
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-user-circle-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Student</span>
                                <span class="info-box-number">{{$studPresentToday}}</span>
                            </div>
                        </div>
                    </div>

                {{--
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h4 class="title">Present Now (Live)</h4>
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-user-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Teachers</span>
                                <span class="info-box-number">{{$teacPresentNow}}</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h4>. </h4>
                        <div class="info-box">
                            <span class="info-box-icon bg-orange"><i class="fa fa-user-circle-o"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Student</span>
                                <span class="info-box-number">{{$studPresentNow}}</span>
                            </div>
                        </div>
                    </div>
                    --}}
            </div>
        </div>

        <div class="row" style="margin-top: 5px; margin-bottom: 5px">
            <div class="col-md-12">
                <div class="col-md-6">
                        <div class="card">
                        <h4 class="title" >Last 7 days</h4>

                            <div id="curve_chart_daily" style="width: 100%; height: 300px"></div>


                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load('current', {'packages':['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Day', 'Students', 'Teachers'],
                                        ['Fri',  0,      0],
                                        ['Sat',  0,      0],
                                        ['Sun',  20,    5],
                                        ['Mon',  17,     3],
                                        ['Tue',  9,     4],
                                        ['Wed',  13,     3],
                                        ['Thu',  {{$studPresentToday}},    {{$teacPresentToday}}]
                                    ]);

                                    var options = {
                                        title: '',
                                        curveType: 'function',
                                        'chartArea': {'width': '85%', 'height': '80%'},
                                        vAxis: {
                                            viewWindowMode:'explicit',
                                            viewWindow: {

                                                min:0}
                                        },
                                        legend: { position: 'bottom' }
                                    };

                                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart_daily'));

                                    chart.draw(data, options);
                                }
                            </script>








</div>

                    </div>
                {{--
                <div class="col-md-6">

                        <h4 class="title">Attendance By Hours</h4>


                    <div id="curve_chart" style="width: 100%; height: 300px"></div>


                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Year', 'Sales', 'Expenses'],
                                ['2004',  1000,      400],
                                ['2005',  1170,      460],
                                ['2006',  660,       1120],
                                ['2007',  1030,      540]
                            ]);

                            var options = {
                                title: '',
                                curveType: 'function',
                                'chartArea': {'width': '85%', 'height': '80%'},
                                legend: { position: 'bottom' }
                            };

                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                            chart.draw(data, options);
                        }
                    </script>





                    </div>
                    --}}
            </div>
        </div>

        <div class="row" style="margin-bottom: 5px;margin-left:0px">
            <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="row" style="margin-bottom: 5px">
                <div class="col-md-12">
                    <div class="card">

                        <h4 class="title">View Attendence</h4>



                    </div>
                </div>
            </div>


            <div class="row" style="margin-bottom: 5px">
                <div class="col-md-12">
                    <div class="card">
                       <a href="{{route('attendance.admin.course.dashboard')}}">
                        <button class="btn btn-primary btn-info pull-left" title="View Attendence of Students (By Class) " >View Attendence of Students (By Class)</button><br />
                       </a>


                    </div>
                </div>
            </div>


            <div class="row" style="margin-bottom: 5px">
                <div class="col-md-12">
                    <div class="card">

                        <button class="btn btn-primary btn-info pull-left" title="Find Attendence of a Student" disabled href="../admin/add">Find Attendence of a Student</button><br />



                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 5px">
                <div class="col-md-12">
                    <div class="card">

                        <button class="btn btn-primary btn-info pull-left" title="View Attendence of Teachers" disabled href="../admin/add">View Attendence of Teachers</button><br />



                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 5px">
                <div class="col-md-12">
                    <div class="card">

                        <button class="btn btn-primary btn-info pull-left" title="Attendance Statistics of Today" disabled href="../admin/add">Attendance Statistics of Today</button><br />



                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 5px">
                <div class="col-md-12">
                    <div class="card">

                        <button class="btn btn-fill btn-info pull-left" title="Attendance Statistics of this Month" disabled href="../admin/add">Attendance Statistics of this Month</button><br />



                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row" style="margin-bottom: 5px">
                    <div class="col-md-12">
                        <div class="card">

                            <h4 class="title">What's Happening Now?</h4>



                        </div>
                    </div>
                </div>

                @foreach($lastAttendance as $la)
                    <div class="row" style="margin-bottom: 5px">
                        <div class="col-md-7">
                            @if($la->role==0)
                                <i class="fa fa-user-circle-o"
                                   style="margin-right: 5px"></i>
                                <b> <a href="{{route('student.globalprofile',['id'=>$la->userid])}}"><text style="color: #000000">{{\App\User::where('id',$la->userid)->first()->name}}</text></a></b>

                            @elseif($la->role==1)
                                <i class="fa fa-user-circle"
                                   style="margin-right: 5px"></i>
                                <b> <text style="color: #000000">{{\App\User::where('id',$la->userid)->first()->name}}</text></b>

                            @endif

                            @if($la->mode=='enter')
                            entered
                            @else
                                left
                            @endif
                            the school
                        </div>

                        <div class="col-md-4">
                            {{date('h:i A', strtotime($la->machinetime))}}
                        </div>
                    </div>

                @endforeach




            </div>
        </div>



    </div>

@endsection