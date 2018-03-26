@extends('template.macosdoc.master.student')

@section('title')
    SMART STUDY - Teacher Panel
@endsection

@section('page-name')

@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="schoolhead">Homework </h3>
        </div>
    </div>
    <div class="row">
        <div>

            @foreach($courses as $c)
                <div style="float: left; margin-right: 10px; margin-bottom: 55px" class="items circle effect2 left_to_right left">
                    <a href="{{route('student.homework.course.index',['courseid'=>$c->id])}}">
                        @if(empty($c->iconpath))
                            <div class="img" style="margin-bottom: 15px;"><img src="assets/img/default.png" alt="img"></div>
                        @else
                            <div class="img" style="margin-bottom: 15px;"><img src="assets/img/{{$c->iconpath}}" alt="img"></div>
                        @endif
                        <div class="info">
                            <h3>{{$c->name}}</h3>

                        </div>
                    </a>
                    <div class="panelbtn" style="margin-bottom: 15px;"><button onclick="window.location.href='{{route('student.homework.course.index',['courseid'=>$c->id])}}'" align="center" type="button" class="btn btn-xs btn-block">{{$c->name}}</button></div>

                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection