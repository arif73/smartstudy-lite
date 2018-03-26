@extends(( Auth::user()->role=="admin") ? 'template.macosdoc.master.admin' : (( Auth::user()->role=="teacher") ? 'template.macosdoc.master.teacher' : 'template.macosdoc.master.student'))



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





{{--Here Teacher is actually User Model--}}
@foreach($course->teachers as $ct)
    @if(Auth::user()->id==$ct->id)
                        <a class="btn btn-primary btn-edit pull-left" style="margin-bottom: 20px;" title="Add Result" href="{{route('teacher.result.add',['id'=>$course->id])}}">Add Result</a>
                        @break
@endif
                        @endforeach


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
                                    @endforeach

                        </tr>

                        @endforeach


                        <tr>

                            <td></td>
                            <td></td>
                            @foreach($results as $i=>$result)
                                <td>
                                    <div>

                                        @if(Auth::user()->id==$result->teachers_id)
                                            <a href="{{route('teacher.result.update',['id'=>$result->id])}}" style="color: #000000"><i class="fa fa-edit " style="padding-left: 5px"
                                                ></i></a>
                                        <a href="{{route('teacher.result.remove',['id'=>$result->id])}}" onclick="return confirm('Are you sure that you want to remove this result for all students permanently?')" style="color: #000000"><i class="fa fa-trash " title="Remove result" style="padding-left: 5px"
                                            ></i></a>
                                        @else
                                            <i class="fa fa-edit " aria-hidden="true" title="You aren't authorized to update result added by other teachers" style="padding-left: 5px;color: grey"
                                               disabled ></i>
                                           <i class="fa fa-trash " aria-hidden="true" title="You aren't authorized to remove result added by other teachers" style="padding-left: 5px;color: grey"
                                               disabled ></i>
                                        @endif
                                       </div>
                                </td>

                            @endforeach



                        </tr>



                        </tbody>
                    </table>
                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection