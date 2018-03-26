@extends('template.macosdoc.master.admin')

@section('title')
    :: Attendance Records
@endsection

@section('page-name')
    :: Attendance Records
@endsection

@section('section-name')
    <b>{{$section->classes->name}} :: {{$section->name}}</b>



@endsection


@section('content')
    Attendance Date : {{ date('d M, Y') }}<br>
    Total Student : {{$student=$section->students->count()}}<br>
    Present Today: {{
$present=count(array_unique(\App\Attendence::where('date',date('Y-m-d'))->whereIn('userid', $section->students()->pluck('userid'))->pluck('userid')->toArray()))}}

    <br>
    Percentage :  @if($student==0||$present==0)
            <text >0%</text>
        @else
        @if(is_int($present/$student))
            <b> {{($present/$student)*100}}%</b>
        @else
            <b> {{number_format(($present/$student)*100, 2)}}%</b>
        @endif
        @endif

    <div class="container-fluid">
        <div class="row">
            <br>
            <p><b>Present Students:</b></p>
            <div class="col-md-12">

                    <div class="table-responsive table-full-width">
                        @include('includes.message-block')
                        <table class="table table-striped">
                            <thead>
                            <th>Nr</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Present</th>
                            <th>Entry Time</th>
                            <th>Exit Time</th>
                            <th>Total Entry</th>

                            </thead>
                            <tbody>

                            @foreach($presentStudents as $i=>$user)

                                <tr>
                                    <td>{{(($presentStudents->currentPage() - 1 ) * $presentStudents->perPage() ) + $i+1 }}</td>
                                    <td><text >
                                            <a href="{{route('teacher.student.attendence.view',['id'=>$user->id])}}">{{$user->name}}</a>
                                            </text></td>
                                    <td>
                                       
                                        <img src="{{getenv('baseurl')}}/uploads/avatars/{{$user->avatar}}" style="width:32px;height:32px;border-radius: 50%;">
                                    

                                    </td>
                                    <td>Yes</td>

                                        @if($present=\App\Attendence::where(['date'=>date('Y-m-d'),'userid'=>$user->id,'mode'=>'enter'])->first())
                                        <td>{{date('h:i A', strtotime($present->machinetime))}} </td>
                                            @else
                                        <td> -- </td>
                                    @endif



                                    @if($present=\App\Attendence::where(['date'=>date('Y-m-d'),'userid'=>$user->id,'mode'=>'exit'])->orderBy('machinetime','DESC')->first())
                                        <td>{{
                                        date('h:i A', strtotime($present->machinetime))

                                        }} </td>
                                    @else
                                        <td> -- </td>
                                    @endif


                                    <td>{{ \App\Attendence::where(['date'=>date('Y-m-d'),'userid'=>$user->id])->count()}} </td>






                                </tr>

                            @endforeach





                            </tbody>
                        </table>
                        <div>


                </div>
            </div>





        </div>
    </div>

        <div class="row">
            <br>
            <p><b>Absent Students:</b></p>
            <div class="col-md-12">

                <div class="table-responsive table-full-width">
                    @include('includes.message-block')
                    <table class="table table-striped">
                        <thead>
                        <th>Nr</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Present</th>
                        <th>Entry Time</th>
                        <th>Exit Time</th>


                        </thead>
                        <tbody>

                        @foreach($absentStudents as $i=>$user)

                            <tr>
                                <td>{{(($absentStudents->currentPage() - 1 ) * $absentStudents->perPage() ) + $i+1 }}</td>
                                <td><text >
                                        <a href="{{route('teacher.student.attendence.view',['id'=>$user->id])}}">{{$user->name}}</a>
                                    </text></td>
                                <td>
                                    <img src="{{getenv('baseurl')}}/uploads/avatars/{{$user->avatar}}" style="width:32px;height:32px;border-radius: 50%;">


                                </td>
                                <td>No</td>
                                <td>--</td>
                                <td>--</td>






                            </tr>

                        @endforeach





                        </tbody>
                    </table>
                    <div>


                    </div>
                </div>





            </div>
        </div>

@endsection