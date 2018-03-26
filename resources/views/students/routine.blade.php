@extends('template.macosdoc.master.student')

@section('title')
    SMART STUDY - Class Routine - Student Panel
@endsection

@section('page-name')
    :: Class Routine
@endsection

@section('section-name')
    Class Routine

@endsection


@section('content')



    <div class="container-fluid" style="margin-top: 10px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width table-bordered ">
                        @include('includes.message-block')

                        <table class="table table-striped">
                            <thead>
                            <th>Day</th>
                            <th>Time Period</th>
                            <th>Teacher</th>
                            <th>Building</th>
                            <th>Room</th>
                            <th>Subject</th>
                            </thead>
                            <tbody>

                            @foreach($dataset as $i=>$data)
                                <tr>
                                    <td>{{$data->day->name}}</td>
                                    <td>{{$data->period->name}}</td>
                                    <td>{{$data->teacher->name}}</td>
                                    <td>{{$data->building->name}}</td>
                                    <td>{{$data->room->roomnumber}}</td>
                                    <td>{{$data->course->name}}</td>

                                </tr>
                            @endforeach





                            </tbody>
                        </table>
                        <div>

                    </div>
                </div>
            </div>





        </div>
    </div>

@endsection