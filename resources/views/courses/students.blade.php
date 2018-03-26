@extends('template.macosdoc.master.teacher')

@section('title')
    Students
@endsection

@section('page-name')
    :: Students
@endsection

@section('section-name')
    {{$course->name}} - Select a student:

@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        @include('includes.message-block')
                        <table class="table table-striped">
                            <thead>
                            <th>Nr</th>
                            <th>Name</th>
                            <th>Matriculation</th>
                            <th>Photo</th>
                            </thead>
                            <tbody>

                            @foreach($students as $i=>$student)
                                <tr>
                                    <td>{{$i+1 }}</td>
                                    <td><a href="{{route('attendence.teacher.viewattendence',['id'=>$student->userdata->id])}}">{{$student->userdata->name}}</a></td>
                                    <td>{{$student->id}}</td>

                                    <td>
                                        <img src="{{getenv('baseurl')}}/uploads/avatars/{{$student->userdata->avatar}}" style="width:32px;height:32px;border-radius: 50%;">
                                    </td>
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