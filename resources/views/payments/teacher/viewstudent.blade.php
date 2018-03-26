@extends('template.macosdoc.master.teacher')

@section('page-name')
    :: Payment :: {{$course->name}}
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        @include('includes.message-block')
                        <h3>Payments:</h3>

                        <table class="table table-striped">
                            <thead>
                            <th>Nr</th>
                            <th>Payment Name</th>
                            <th>Date</th>
                            <th>Last Updated</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($payments as $i=>$p)
                                <tr>
                                    <td>{{$i+1 }}</td>
                                    <td>{{$p->name}}</td>
                                    <td>{{date('d M, Y (h:m A)', strtotime($p->created_at))}}</td>
                                    <td>{{date('d M, Y (h:m A)', strtotime($p->updated_at))}}</td>
                                    <td >{{$p->amount}}</td>
                                    <td>{{$p->due}}</td>
                                    <td>
                                            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('teacher.student.payment.update',['id'=>$p->id])}}"><i class="fa fa-pencil"></i></a>

                                               <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('teacher.student.payment.remove',['id'=>$p->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>






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

        <a class="btn btn-primary btn-edit pull-left" title="+Add Payment" href="{{route('teacher.student.payment.add',['courseid'=>$course->id,'studentid'=>$student->userid])}}">Add Payment</a>
        <a class="btn btn-primary btn-edit pull-left" style="margin-left: 5px" title="+Back" href="{{route('course.payment.teacher',['courseid'=>$course->id])}}">Back</a>
    </div>
@endsection