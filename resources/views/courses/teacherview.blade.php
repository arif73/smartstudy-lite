@extends('template.macosdoc.master.teacher')

@section('title')
    Teacher Panel - View Course
@endsection

@section('page-name')
    ::Course ({{$data->name}})
@endsection

@section('section-name')





@endsection

@section('content')
    @include('includes.message-block')

    <div class="header">
        <h3 class="title" style="margin-bottom: 20px;">{{$data->name}} ({{$data->codename}})  <img src="{{route('course.icon',['iconpath'=>$data->iconpath])}}" style="width:40px;height:40px;border-radius: 50%;margin-left: 10px;"></h3>
    </div>
    <div class="content table-responsive table-full-width">

        <table class="table">

            <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{$data->name}}</td>
            </tr>

            <tr>
                <th scope="row">Code Name</th>
                <td>{{$data->codename}}</td>
            </tr>

            <tr>
                <th scope="row">Description</th>
                <td>{{$data->description}}</td>
            </tr>

            <tr>
                <th scope="row">Sessions</th>
                <td>{{$data->sessions_id}}</td>
            </tr>

            <tr>
                <th scope="row">Start</th>
                <td>{{$data->start}}</td>
            </tr>

            <tr>
                <th scope="row">End</th>
                <td>{{$data->end}}</td>
            </tr>

            </tbody>


        </table>






    </div>



    <div class="card">
        <div class="content">

            <h4 >Class Schedule:</h4>
            <div class="container-fluid">
                <div class="row">
                    <table class="table ">
                        <thead>
                        <th>Day</th>
                        <th>Period</th>
                        <th>Building</th>
                        <th>Room</th>
                        <th>Teacher</th>

                        </thead>
                        <tbody>

                        @foreach($schedule as $i=>$s)
                            <tr>
                                <td>{{$s->day->name }}</td>
                                <td>{{$s->period->name}}</td>
                                <td>{{$s->building->name}}</td>
                                <td>{{$s->room->roomnumber}}</td>
                                <td>{{$s->teacher->name}}</td>
                            </tr>
                        @endforeach





                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="content">

            <h4 >Assigned Class and Sections:</h4>
            <div class="container-fluid">
                <div class="row">
                    <table class="table ">
                        <thead>
                        <th>Class</th>
                        <th>Section</th>
                        </thead>
                        <tbody>


                            <tr>
                                <td>
                                    @foreach($data->classes as $class)
                                            {{$class->name}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($data->sections as $section)
                                        {{$section->name}}
                                    @endforeach
                                </td>
                            </tr>






                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection