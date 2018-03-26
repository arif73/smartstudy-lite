@extends(( Auth::user()->role=="admin") ? 'template.macosdoc.master.admin' : (( Auth::user()->role=="teacher") ? 'template.macosdoc.master.teacher' : 'template.macosdoc.master.student'))



@section('title')
    SMART STUDY - Student Panel
@endsection

@section('page-name')
    :: Result
@endsection

@section('section-name')
    Results

@endsection


@section('content')

    <div class="container-fluid" style="margin-top: 10px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content">
                        @include('includes.message-block')

                        @foreach($student->courses as $course)


                        @if($course->results->count()>0)
                                <h5 ><b>{{$course->name}}</b></h5>
                        Result:
                            <table class="table table-striped table-bordered" style="margin-top: 10px;">
                                <thead >

                                @foreach($course->results as $i=>$result)
                                    <th width="{{70/$course->results->count()}}%">{{$result->name}} </th>

                                @endforeach


                                </thead>
                                <tbody>

                                <tr>


                                    @foreach($course->results as $i=>$result)
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



                                <tr >

                                        @foreach($course->results as $j=>$r)
                                            {{--  @if(!$s->results->isEmpty())--}}
                                            @if($studentresult=$student->results->where('results_id',$r->id)->first())
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




                                </tbody>
                            </table>
                            @endif
                                @endforeach


                        <b>Note: Only those subjects are shown, for which at least one result has been published.</b>




                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection