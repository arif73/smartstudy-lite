@extends('template.macosdoc.master.admin')

@section('title')
    SMART STUDY - Teacher Panel
@endsection

@section('page-name')
    @if($target=='view')
        :: Courses
    @elseif($target=='homework')
        :: Homework
    @elseif($target=='attendence')
        :: Attendence
    @elseif($target=='result')
        :: Result
    @endif
@endsection

@section('section-name')
    @if($target=='view')
        Courses
    @elseif($target=='homework')
        Select a course:
    @elseif($target=='attendence')
        Select a course:
    @elseif($target=='result')
        Select a course:
    @endif

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
                            <th>Nr</th>
                            <th>Course Name</th>
                            <th>Class</th>
                            <th>Section</th>

                            </thead>
                            <tbody>

                            @foreach($dataset as $i=>$data)
                                <tr>
                                    <td>{{(($dataset->currentPage() - 1 ) * $dataset->perPage() ) + $i+1 }}</td>
                                    @if($target=='view')
                                    <td><a href="{{route('course.view.teacher',['id'=>$data->id])}}">{{$data->name}}</a></td>
                                        @elseif($target=='homework')
                                        <td><a href="{{route('teacher.homework.course.index',['id'=>$data->id])}}">{{$data->name}}</a></td>
                                        @elseif($target=='attendence')
                                        <td><a href="{{route('course.students',['id'=>$data->id])}}">{{$data->name}}</a></td>

                                    @elseif($target=='result')
                                        <td><a href="{{route('teacher.result.course',['id'=>$data->id])}}">{{$data->name}}</a></td>
                                    @endif
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