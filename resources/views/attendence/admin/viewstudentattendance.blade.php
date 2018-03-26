
@extends('template.macosdoc.master.admin')


@section('page-name')
    :: Attendance Statistics
@endsection

@section('section-name')
    <img src="{{getenv('baseurl')}}/uploads/avatars/{{$student->userdata->avatar}}" style="width:100px;height:100px;border-radius: 50%;float:left;margin-right: 25px;margin-bottom: 10px;">
    <div class="col-lg-3">
        <b>{{ $student->userdata->name }}</b>
        {{--
        @if(checkPermission(['admin|teacher']))
        <div class="button_action" style="text-align:left;margin-top: 5px;"><a class="btn btn-xs btn-primary " title="Change" href="{{route('student.edit',['id'=>$user->id])}}">Change</a> </div>
            @else
                <div class="button_action" style="text-align:left;margin-top: 5px;"><a class="btn btn-xs btn-primary " title="Change" href="#">Ask school to change info</a> </div>
                    @endif
                    --}}
    </div>
@endsection

@section('content')

    <div class="content table-responsive table-full-width">
        <table class="table">

            <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{$student->userdata->name}}</td>
            </tr>



            <tr>
                <th scope="row">Username</th>
                <td>{{$student->userdata->username}}</td>
            </tr>

            <tr>
                <th scope="row">Email Address</th>
                <td>{{$student->userdata->email}}</td>
            </tr>

            <tr>
                <th scope="row">School ID</th>
                <td>{{$student->userdata->id}}</td>
            </tr>

            <tr>
                <th scope="row">About</th>
                <td>{{$student->about}} </td>
            </tr>





            </tbody>
        </table>


    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="content table-responsive table-full-width">
                    @include('includes.message-block')
                    <h3>Attendance:</h3>

                    <table class="table table-striped">
                        <thead>
                        <th>Nr</th>
                        <th>Mode</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>


                        </thead>
                        <tbody>

                        @foreach($attendance as $i=>$a)
                            <tr>
                                <td>{{$i+1 }}</td>
                                <td>{{$a->mode}}</td>
                                <td>{{date('d M, Y', strtotime($a->date))}}</td>
                                <td>{{date('h:i A', strtotime($a->machinetime))}}</td>
                                @if($a->status==1)
                                    <td >Approved</td>
                                    @elseif($a->status==0)
                                    <td >Approved</td>
                                    @endif

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