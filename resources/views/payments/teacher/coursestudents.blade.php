@extends('template.macosdoc.master.teacher')

@section('title')
    Teacher Panel - View Course
@endsection

@section('page-name')
    ::Payment
@endsection

@section('section-name')





@endsection

@section('content')
    @include('includes.message-block')

    <div class="header">
        <h3 class="title" style="margin-bottom: 20px;">{{$data->name}} ({{$data->codename}})  <img src="{{route('course.icon',['iconpath'=>$data->iconpath])}}" style="width:40px;height:40px;border-radius: 50%;margin-left: 10px;"></h3>
    </div>
    <div class="content table-responsive table-full-width">

        <table class="table">

            <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{$data->name}}</td>
            </tr>

            <tr>
                <th scope="row">Code Name</th>
                <td>{{$data->codename}}</td>
            </tr>

            <tr>
                <th scope="row">Description</th>
                <td>{{$data->description}}</td>
            </tr>

            <tr>
                <th scope="row">Start</th>
                <td>{{date('d M, Y', strtotime($data->start))}}</td>
            </tr>

            <tr>
                <th scope="row">End</th>
                <td>{{date('d M, Y', strtotime($data->end))}}</td>
            </tr>

            </tbody>


        </table>






    </div>


    <div class="row" style="margin-left: 4px">
        <br>
        <p><b>Course Students:</b></p>
        <div class="col-md-12">

            <div class="table-responsive table-full-width">
                @include('includes.message-block')
                <table class="table table-striped">
                    <thead>
                    <th>Nr</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Last Payment</th>
                    <th>Amount</th>
                    <th>Due</th>
                    <th>Date</th>
                    <th>Payments</th>
                    <th>Total Due</th>
                    <th>Total Paid</th>

                    </thead>
                    <tbody>

                    @foreach($students as $i=>$student)

                        <tr>
                            <td>{{(($students->currentPage() - 1 ) * $students->perPage() ) + $i+1 }}</td>
                            <td><text >
                                    <a href="{{route('course.payment.student',['studentid'=>$student->userdata->id,'courseid'=>$data->id])}}">{{$student->userdata->name}}</a>
                                </text></td>
                            <td>

                                    <img src="{{getenv('baseurl')}}/uploads/avatars/{{$student->userdata->avatar}}" style="width:32px;height:32px;border-radius: 50%;">


                            </td>


                            @if($payment=\App\Payments::where(['courses_id'=>$data->id,'userid'=>$student->userid])->first())

                                <?php
                                $totalPaid=0;
                                $totalDue=0;
                                $paymentNumbers=0;
                                ?>
                                @foreach($payments=\App\Payments::where(['courses_id'=>$data->id,'userid'=>$student->userid])->get() as $p)
                                    <?php
                                        $totalPaid+=$p->amount;
                                        $totalDue+=$p->due;
                                        $paymentNumbers+=1;
                                    ?>
                                @endforeach
                                    <td> {{$payment->name}}</td>
                                    <td> {{$payment->amount}}</td>
                                    <td> {{$payment->due}}</td>
                                    <td> {{date('d M, Y', strtotime($payment->created_at))}}</td>
                                    <td> {{$paymentNumbers}}</td>
                                    <td> {{$totalDue}}</td>
                                    <td> {{$totalPaid}}</td>
                            @else
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>
                                <td>--</td>

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



@endsection