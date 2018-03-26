@extends('template.macosdoc.master.teacher')

@section('title')
    SMART STUDY - Teacher Panel
@endsection

@section('page-name')
    :: Courses
@endsection

@section('section-name')
    Results ::  <a href="{{route('course.view.teacher',['id'=>$course->id])}}" style="color: #000000"><u>{{$course->name}}</u></a>

@endsection


@section('content')

    <div class="container-fluid" style="margin-top: 10px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        @include('includes.message-block')








                        <a class="btn btn-primary btn-edit pull-left" style="margin-bottom: 20px;" title="Add Result" href="{{route('teacher.result.add',['id'=>$course->id])}}">Add Result</a>


                        <form action="{{ route('post.result.update') }}" role="form" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <table class="table table-striped table-bordered" style="margin-top: 10px;">
                                <thead >
                                <th >Nr</th>
                                <th>Student Name</th>
                                @foreach($results as $i=>$result)
                                    <th width="{{70/$course->results->count()}}%">{{$result->name}} </th>

                                @endforeach


                                </thead>
                                <tbody>

                                <tr>

                                    <td style="background: #ffffff"></td>
                                    <td style="background: #ffffff"></td>
                                    @foreach($results as $i=>$result)
                                        <td style="background: #ffffff">
                                            <div>
                                                <text style="font-size:  12px; line-height: 1pt">
                                                    {{$result->teacher->name}} <br>
                                                    @if($result->type==1)
                                                        Type: Mark<br>
                                                        Mark: {{$result->mark}}<br>
                                                        @if($result->passmark!=null)
                                                            Pass Mark: {{$result->passmark}}<br>
                                                        @endif
                                                    @elseif($result->type==2)
                                                        Type: Pass/Fail<br>
                                                    @elseif($result->type==3)
                                                        Type: Others<br>
                                                    @endif
                                                </text>
                                            </div>
                                        </td>

                                    @endforeach



                                </tr>

                                @foreach($students as $i=>$s)

                                    <tr >

                                        <td>{{$i+1}}</td>
                                        <td>  <img src="{{getenv('baseurl')}}/uploads/avatars/{{$s->userdata->avatar}} " style="width:24px;height:24px;border-radius: 50%; margin-right: 5px"> <a href="{{route('student.globalprofile',['id'=>$s->userid])}}">{{$s->userdata->name}}</a></td>
                                        @foreach($results as $j=>$r)
                                            {{--Editing results starts here--}}
                                            @if($r->id==$workingResult->id)

                                                    @if($r->type==1)
                                                        <td width="20%">
                                                            <div class="form-group{{ $errors->has('students_mark.'.$i) ? ' has-error' : '' }}">
                                                                <input type="hidden" id="students_id[{{$i}}]" type="text"  name="students_id[{{$i}}]" value="{{$s->userid}}">
                                                                @if($studentresult=$s->results->where('results_id',$r->id)->first())
                                                                    <input class="col-md-12" id="students_mark[{{$i}}]" type="text" class="form-control border-input" placeholder="" name="students_mark[{{$i}}]" value="{{$studentresult->mark}}">
                                                                @else
                                                                    <input class="col-md-12" id="students_mark[{{$i}}]" type="text" class="form-control border-input" placeholder="" name="students_mark[{{$i}}]" value="">
                                                                @endif

                                                                @if ($errors->has('students_mark.'.$i))
                                                                    <span class="help-block"><strong>{{ $errors->first('students_mark.'.$i) }}</strong></span>
                                                                @endif

                                                            </div>
                                                        </td>
                                                    @elseif($r->type==2)
                                                        <td width="20%">
                                                            <div class="form-group{{ $errors->has('status.'.$i) ? ' has-error' : '' }}">
                                                                <input type="hidden" id="students_id[{{$i}}]" type="text"  name="students_id[{{$i}}]" value="{{$s->userid}}">
                                                                @if($studentresult=$s->results->where('results_id',$r->id)->first())
                                                                    @if($studentresult->pass==1)
                                                                        <select class="col-md-12 form-control input-sm border-input"  name="status[{{$i}}]" id="status[{{$i}}]">
                                                                            <option value="1" selected="true">Passed</option>
                                                                            <option value="0" >Failed</option>
                                                                            <option value="2" >Pending</option>
                                                                        </select>
                                                                    @elseif($studentresult->pass==0)
                                                                        <select class="col-md-12 form-control input-sm border-input"  name="status[{{$i}}]" id="status[{{$i}}]">
                                                                            <option value="0" selected="true">Failed</option>
                                                                            <option value="1" >Passed</option>
                                                                            <option value="2" >Pending</option>
                                                                        </select>
                                                                    @else
                                                                        <select class="col-md-12 form-control input-sm border-input"  name="status[{{$i}}]" id="status[{{$i}}]">
                                                                            <option value="2" selected="true">Pending</option>
                                                                            <option value="1" >Passed</option>
                                                                            <option value="0" >Failed</option>

                                                                        </select>
                                                                    @endif
                                                                @else
                                                                    <select class="col-md-12 form-control input-sm border-input"  name="status[{{$i}}]" id="status[{{$i}}]">
                                                                        <option value="2" selected="true">Pending</option>
                                                                        <option value="1" >Passed</option>
                                                                        <option value="0" >Failed</option>

                                                                    </select>
                                                                @endif

                                                                @if ($errors->has('status.'.$i))
                                                                    <span class="help-block"><strong>{{ $errors->first('status.'.$i) }}</strong></span>
                                                                @endif

                                                            </div>
                                                        </td>
                                                    @elseif($r->type==3)
                                                        <td width="20%">
                                                            <div class="form-group{{ $errors->has('students_other.'.$i) ? ' has-error' : '' }}">
                                                                <input type="hidden" id="students_id[{{$i}}]" type="text"  name="students_id[{{$i}}]" value="{{$s->userid}}">
                                                                @if($studentresult=$s->results->where('results_id',$r->id)->first())
                                                                    <input class="col-md-12" id="students_other[{{$i}}]" type="text" class="form-control border-input" placeholder="" name="students_other[{{$i}}]" value="{{$studentresult->other}}">
                                                                @else
                                                                    <input class="col-md-12" id="students_other[{{$i}}]" type="text" class="form-control border-input" placeholder="" name="students_other[{{$i}}]" value="">
                                                                @endif

                                                                @if ($errors->has('students_other.'.$i))
                                                                    <span class="help-block"><strong>{{ $errors->first('students_other.'.$i) }}</strong></span>
                                                                @endif

                                                            </div>
                                                        </td>
                                                    @endif

                                            @else
                                                {{--  @if(!$s->results->isEmpty())--}}
                                                @if($studentresult=$s->results->where('results_id',$r->id)->first())
                                                    @if($r->type==1)
                                                        @if($r->passmark==null)
                                                            <td > {{$studentresult->mark}}  </td>
                                                        @else
                                                            @if($studentresult->pass==1)
                                                                <td style="background: #51ff1b"> {{$studentresult->mark}} </td>
                                                            @elseif(($studentresult->pass==0))
                                                                <td style="background: #ff2207"> {{$studentresult->mark}} </td>
                                                            @endif
                                                        @endif
                                                    @elseif($r->type==2)
                                                        @if($studentresult->pass==1)
                                                            <td style="background: #51ff1b"> Passed </td>
                                                        @elseif($studentresult->pass==0)
                                                            <td style="background: #ff2207"> Failed </td>
                                                        @else
                                                            <td style="background: #fbff44"> Pending </td>
                                                        @endif
                                                    @elseif($r->type==3)
                                                        <td > {{$studentresult->other}} </td>
                                                    @endif
                                                @else
                                                    <td style="background: #fbff44">Pending</td>
                                                @endif
                                                {{--  @endif--}}
                                            @endif
                                        @endforeach

                                    </tr>

                                @endforeach


                                <tr>

                                    <td></td>
                                    <td></td>
                                    @foreach($results as $i=>$result)
                                        <td>
                                            <div>

                                                @if($result->id==$workingResult->id)
                                                    <button type="submit" style=""><i class="fa fa-check-square-o " style="padding-left: 5px"></i></button>

                                                @endif
                                            </div>
                                        </td>

                                    @endforeach



                                </tr>



                                </tbody>
                            </table>
                            <input type="hidden" name="courses_id" id="courses_id" value="{{$course->id}}">
                            <input type="hidden" name="inputnumbers" id="inputnumbers" value="{{$students->count()}}">
                            <input type="hidden" name="results_id" id="results_id" value="{{$workingResult->id}}">
                            <input type="hidden" name="teachers_id" id="teachers_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="results_type" id="results_type" value="{{$workingResult->type}}">
                        </form>
                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection