@extends('template.macosdoc.master.admin')

@section('title')
    Classes
@endsection

@section('page-name')
    :: Attendance Records
@endsection

@section('section-name')

  <b>  Attendance Date : {{ date('d M, Y') }}</b>

@endsection


@section('content')


    Total Student : {{$student=\App\User::where('role','student')->count()}}<br>
    Present Today: {{
$present=count(array_unique(\App\Attendence::where(['date'=>date('Y-m-d'),'role'=>1])->pluck('userid')->toArray()))}}
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
<br><br>
    <b>Select a class/section:</b>

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
                            <th>Students</th>
                            <th>Present</th>
                            <th>Percentage</th>

                            </thead>
                            <tbody>

                            @foreach($datacollection as $i=>$data)

                                <tr>
                                    <td><b>{{(($datacollection->currentPage() - 1 ) * $datacollection->perPage() ) + $i+1 }}</b></td>
                                    <td><b><text >{{$data->name}}</text></b></td>
                                    <td><b>{{$student=$data->students->count()}}</b></td>
                                    <td><b>
                                        {{--
                                        @if($data->present->count()>0)
                                    @foreach ($data->present as $pre=>$p)
                                        {{$p->id}}
                                    @endforeach
                                            @endif
                                            --}}
                                        {{
$present=\App\Attendence::where('date',date('Y-m-d'))->whereIn('userid', $data->students()->pluck('userid'))->count()}}

                                        </b></td>

                                    @if($student==0||$present==0)
                                        <td><b><text style="color: red">0%</text></b></td>
                                    @else
                                        @if(is_int($present/$student))
                                        <td><b> {{($present/$student)*100}}%</b></td>
                                            @else
                                            <td><b> {{number_format(($present/$student)*100, 2)}}%</b></td>
                                            @endif

                                    @endif






                                </tr>

                                @foreach($data->sections as $sections=>$s)
                                    <tr>
                                       {{--  <td>{{(($datacollection->currentPage() - 1 ) * $datacollection->perPage() ) + $i+1 }}{{"."}}{{$sections}}</td>--}}
                                        <td></td>
                                        <td>
                                            <a href="{{route('attendance.admin.view.section',['id'=>$s->id])}}">{{$s->name}}</a>
                                            </td>
                                        <td>{{$s->students->count()}}</td>
                                        <td>{{
$present=\App\Attendence::where('date',date('Y-m-d'))->whereIn('userid', $s->students()->pluck('userid'))->count()
                                        }}</td>
                                        @if($student==0||$present==0)
                                            <td><text style="color: red">0%</text></td>
                                        @else
                                            @if(is_int($present/$student))
                                                <td><b> {{($present/$student)*100}}%</b></td>
                                            @else
                                                <td><b> {{number_format(($present/$student)*100, 2)}}%</b></td>
                                            @endif
                                        @endif

                                    </tr>
                                @endforeach
                            @endforeach





                            </tbody>
                        </table>
                        <div>
</div>

                    </div>
                </div>
            </div>





        </div>
    </div>

@endsection