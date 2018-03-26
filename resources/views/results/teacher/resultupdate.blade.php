@extends('template.macosdoc.master.admin')

@section('title')
    Result
@endsection

@section('page-name')
    :: Result
@endsection

@section('section-name')

    {{$course->name}} - {{$result->name}}

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div >
                    @include('includes.message-block')
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-md-12">
                        <form action="{{ route('post.result.update') }}" role="form" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <table  class="table table-striped table-bordered">
                                <thead>
                                <th>Nr</th>
                                <th>Student Name</th>
                                <th>1st Quiz</th>
                                <th>2nd Quiz (20)</th>
                                <th>Exam (60)</th>
                                <th>2nd Quiz (20)</th>

                                <th>Exam (60)</th>


                                </thead>
                                <tbody>

                                <tr>

                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <text style="font-size:  12px; line-height: 1pt">
                                                Selim Chowdhury <br>
                                                Type: Mark:40<br>
                                                Pass Mark: 20
                                            </text>




                                        </div></td>
                                    <td>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <text style="font-size:  12px; line-height: 1pt">
                                                Selim Chowdhury <br>
                                                Type: Pass/Fail
                                            </text>



                                        </div>
                                    </td>
                                    <td>
                                        <text style="font-size:  12px; line-height: 1pt">
                                            Selim Chowdhury <br>
                                            Type: Pass/Fail
                                        </text>
                                    </td>
                                    <td>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <text style="font-size:  12px;  line-height: 1pt">
                                                Kabir Khan <br>
                                                Type: Mark:50<br>
                                                Pass Mark: 20
                                            </text>




                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <text style="font-size:  12px; line-height: 1pt">
                                                Selim Chowdhury <br>
                                                Type: Mark:40<br>
                                                Pass Mark: 20
                                            </text>




                                        </div>
                                    </td>

                                </tr>

                                @foreach($students as $i=>$s)
                                    <tr>

                                        <td>{{$i+1}}</td>
                                        <td>{{$s->userdata->name}}</td>
                                        <td width="18%">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                                <input class="col-md-4" id="name" type="text" class="form-control border-input" placeholder="40" name="name" value="  ">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif

                                            </div></td>
                                        <td width="18%">

                                            <div  class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">

                                                <select class="col-md-7" onchange="optionCheckStatus(this);" class="form-control input-sm border-input"  name="status" id="status">
                                                    <option value="0" selected="true">Pending</option>
                                                    <option value="1" >Pass</option>
                                                    <option value="2" >Fail</option>

                                                </select>

                                                @if ($errors->has('status'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                        </td>
                                        <td width="18%">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                                <input class="col-md-8" id="name" type="text" class="form-control border-input" placeholder="40" name="name" value="  ">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif

                                            </div></td>
                                        </td>
                                        <td width="18%">
                                            <text style="font-size:  12px;  line-height: 1pt">
                                                17
                                            </text>
                                        </td>

                                        <td width="18%">
                                            <div class="form-group{{ $errors->has('mark_'+$i+1) ? ' has-error' : '' }}">

                                                <input type="hidden" id="students_id[{{$i}}]" type="text"  name="students_id[{{$i}}]" value="{{$s->userid}}">
                                                <input class="col-md-4" id="students_mark[{{$i}}]" type="text" class="form-control border-input" placeholder="40" name="students_mark[{{$i}}]" value="">


                                                {{--<input type="hidden" name="students_id_{{$i+1}}" id="students_id_{{$i+1}}" value="{{$s->userid}}">
                                                <input class="col-md-4" id="mark_{{$i+1}}" type="text" class="form-control border-input" placeholder="40" name="mark_{{$i+1}}" value="  ">
                                                 --}}
                                                @if ($errors->has('mark_'+$i+1))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('mark_'+$i+1) }}</strong>
                                    </span>
                                                @endif

                                            </div>
                                        </td>

                                    </tr>




                                @endforeach

                                <tr>

                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div>
                                            <button type="submit" style="">Submit</button>
                                        </div></td>
                                    <td>
                                        <div>
                                            <button type="submit" style="">Submit</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <button type="submit"  class="">Submit</button>
                                        </div>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <div>
                                            <button type="submit"  class="">Submit</button>
                                        </div>
                                    </td>


                                </tr>








                                </tbody>


                            </table>

                            <input type="hidden" name="courses_id" id="courses_id" value="{{$course->id}}">
                            <input type="hidden" name="inputnumbers" id="inputnumbers" value="2">
                            <input type="hidden" name="results_id" id="results_id" value="7">
                            <input type="hidden" name="teachers_id" id="teachers_id" value="15">
                            <input type="hidden" name="results_type" id="results_type" value="1">
                        </form>
                    </div>


                </div>



            </div>


        </div>

    </div>

@endsection